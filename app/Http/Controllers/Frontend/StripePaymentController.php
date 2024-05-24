<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderMailEvent;
use App\Events\OrderStatusUpdateEvent;
use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdateMail;
use App\Models\Frontend\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;



class StripePaymentController extends Controller
{

    public function payWithStripe()
    {
        try {
            Stripe::setApiKey(config('paymentSettings.stripe_secret_key'));

            // total amount to pay
            $grandTotal = session()->get('grandTotal');
            $totalAmount = round($grandTotal * config('paymentSettings.stripe_currency_rate')) * 100;


            $response = StripeSession::create([

                'line_items'    => [
                    [
                        'price_data'    => [
                            'currency'  => config('paymentSettings.stripe_currency_name'),
                            'product_data' => [
                                'name' => 'Product'
                            ],
                            'unit_amount'   => $totalAmount,
                        ],
                        'quantity' => 1,
                    ]

                ],
                'mode'          => 'payment',
                'success_url'   => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'    => route('stripe.cancel'),
            ]);

            return redirect()->away($response->url);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    public function stripeSuccess(Request $request, OrderService $orderService)
    {
        try {
            $sessionId = $request->session_id;

            Stripe::setApiKey(config('paymentSettings.stripe_secret_key'));

            $response = StripeSession::retrieve($sessionId);

            if ($response->payment_status == 'paid') {
                $orderId = session()->get('orderId');

                $paymentInfo = [
                    'transaction_id'    => $response->id,
                    'currency'          => $response->currency,
                    'status'            => 'completed',
                ];


                // fire payment event with data
                OrderStatusUpdateEvent::dispatch($orderId, $paymentInfo, 'Stripe');

                // fire mail event with data
                $order = Order::findOrFail($orderId);
                OrderMailEvent::dispatch($order);


                // clear the cache
                $orderService->clearSession();

                // show success page
                return redirect()->route('payment.success')->with('success', 'Payment Successful');
            } else {

                $this->transactionFailedStatusUpdate('Stripe');
                // show error page
                return redirect()->route('payment.error');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public function stripeCancel()
    {
        try {
            // called transaction failed status update
            $this->transactionFailedStatusUpdate('Stripe');

            return redirect()->route('payment.error');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    public function transactionFailedStatusUpdate($gatewayName)
    {
        try {
            $orderId = session()->get('orderId');

            $paymentInfo = [
                'transaction_id'    => '',
                'status'            => 'Failed',
                'currency'          => '',
            ];

            // fire event
            OrderStatusUpdateEvent::dispatch($orderId, $paymentInfo, $gatewayName);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
