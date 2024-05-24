<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderMailEvent;
use App\Events\OrderStatusUpdateEvent;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Razorpay\Api\Api as RazorpayApi;


class RazorpayPaymentController extends Controller
{
    public function razorPayRedirect()
    {
        try {
            return view('frontend.pages.razorpay-redirect');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function payWithRazorpay(Request $request, OrderService $orderService)
    {
        try {
            $api = new RazorpayApi(
                config('paymentSettings.razorpay_api_key'),
                config('paymentSettings.razorpay_secret_key'),
            );


            // total amount
            $grandTotal = session()->get('grandTotal');
            $totalAmount = round($grandTotal * config('paymentSettings.razorpay_currency_rate')) * 100;


            // check payment complete or not
            if ($request->has('razorpay_payment_id') && $request->filled('razorpay_payment_id')) {
                $response = $api->payment
                    ->fetch($request->razorpay_payment_id)
                    ->capture(['amount'     => $totalAmount]);


                // check status
                if ($response['status'] == 'captured') {
                    $orderId = session()->get('orderId');

                    $paymentInfo = [
                        'transaction_id'    => $response['id'],
                        'status'            => 'completed',
                        'currency'          => config('settings.default_currency')
                    ];


                    // fire payment event with data
                    OrderStatusUpdateEvent::dispatch($orderId, $paymentInfo, 'RazorPay');

                    // fire mail event with data
                    $order = Order::findOrFail($orderId);
                    OrderMailEvent::dispatch($order);


                    // clear the cache
                    $orderService->clearSession();

                    // show success page
                    return redirect()->route('payment.success')->with('success', 'Payment Successful');
                } else {
                    $this->transactionFailedStatusUpdate('RazorPay');
                    // show error page
                    return redirect()->route('payment.error');
                }
            }

            // else
            else {
                $this->transactionFailedStatusUpdate('RazorPay');
                // show error page
                return redirect()->route('payment.error');
            }
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


            // fire payment event with data
            OrderStatusUpdateEvent::dispatch($orderId, $paymentInfo, $gatewayName);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
