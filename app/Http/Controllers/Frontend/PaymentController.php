<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{

    // payment page
    public function payment()
    {
        if (!session()->get('deliveryCharge') || !session()->get('address')) {
            throw  ValidationException::withMessages(['Something Went Wrong']);
        }


        $subtotal = cartTotalPrice();
        $discount = session()->get('coupon')['discount'] ?? 0;
        $deliveryCharge = session()->get('deliveryCharge') ?? 0;
        $grandTotal = grandTotal($deliveryCharge);


        return view('frontend.checkout.payment', [
            'subtotal'              => $subtotal,
            'discount'              => $discount,
            'deliveryCharge'        => $deliveryCharge,
            'grandTotal'            => $grandTotal
        ]);
    }


    // make payment
    public function makePayment(Request $request, OrderService $orderService)
    {

        $request->validate([
            'payment_gateway'       => ['required', 'string', 'in:paypal,stripe,razorpay']
        ]);

        try {
            if ($orderService->createOrder()) {
                switch ($request->payment_gateway) {
                    case 'paypal':
                        return response()->json('hi');

                        break;

                    case 'stripe':
                        return redirect()->route('payment.success')->with('success', 'Payment Successful');

                        break;

                    case 'razorpay':
                        return redirect()->route('payment.success')->with('success', 'Payment Successful');

                        break;

                    default:
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
