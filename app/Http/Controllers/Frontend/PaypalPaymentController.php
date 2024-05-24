<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderMailEvent;
use App\Events\OrderNaimEvent;
use App\Events\OrderPaymentCompleteEvent;
use App\Events\OrderStatusUpdateEvent;
use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdateMail;
use App\Models\Frontend\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalPaymentController extends Controller
{
    // setting configuration
    public function setPaypalConfig()
    {
        try {
            return [
                'mode'    => config('paymentSettings.paypal_account_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
                'sandbox' => [
                    'client_id'         => config('paymentSettings.paypal_api_key'),
                    'client_secret'     => config('paymentSettings.paypal_secret_key'),
                    'app_id'            => 'APP-80W284485P519543T',
                ],
                'live' => [
                    'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
                    'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
                    'app_id'            => config('paymentSettings.paypal_app_id'),
                ],

                'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
                'currency'       => config('paymentSettings.paypal_currency_name'),
                'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
                'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
                'validate_ssl'   => true, // Validate SSL when creating api client.
            ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // paypal payment
    public function payWithPaypal()
    {
        try {

            $config = $this->setPaypalConfig();
            $provider = new PaypalClient($config);
            $provider->getAccessToken();


            $grandTotal = session()->get('grandTotal');
            $totalAmount = round($grandTotal * config('paymentSettings.paypal_currency_rate'));


            // make response
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('paypal.success'),
                    "cancel_url" => route('paypal.cancel'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => config('paymentSettings.paypal_currency_name'),
                            "value" => $totalAmount,
                        ]
                    ]
                ]
            ]);



            if (isset($response['id']) && $response['id'] !== NULL) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] == 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('payment.error')->withErrors(['error' => $response['error']['message']]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    // paypal success
    public function paypalSuccess(Request $request, OrderService $orderService)
    {
        try {

            $config = $this->setPaypalConfig();
            $provider = new PayPalClient($config);
            $provider->getAccessToken();

            $response = $provider->capturePaymentOrder($request['token']);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                $orderId = session()->get('orderId');

                $capture = $response['purchase_units'][0]['payments']['captures'][0];

                $paymentInfo = [
                    'transaction_id'        => $capture['id'],
                    'status'                => 'completed',
                    'currency'              => $capture['amount']['currency_code'],
                ];

                // fire payment event with data
                OrderStatusUpdateEvent::dispatch($orderId, $paymentInfo, 'paypal');

                // fire mail event with data
                $order = Order::findOrFail($orderId);
                OrderMailEvent::dispatch($order);


                // clear the cache
                $orderService->clearSession();

                // show success page
                return redirect()->route('payment.success')->with('success', 'Payment Successful');
            } else {

                // show error page
                return redirect()->route('payment.error')->withErrors(['error' => $response['error']['message']]);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    // paypal cancel
    public function paypalCancel()
    {
        try {
            return redirect()->route('payment.error');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // payment success
    public function paymentSuccess(OrderService $orderService)
    {
        try {
            $orderService->clearSession();
              return view('frontend.order.success');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // payment error
    public function paymentError()
    {
        try {
            return view('frontend.order.error');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
