<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Address;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    // checkout page
    public function checkout()
    {
        try {
            $addresses = Address::where('user_id', Auth::id())->get();

            return view('frontend.checkout.checkout', [
                'addresses'     => $addresses,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // define delivery charge
    public function checkoutDelivery(Request $request)
    {
        try {
            $address = Address::findOrFail($request->address_id);
            $deliveryAmount = $address->delivery?->delivery_charge;


            $grandTotal = grandTotal($deliveryAmount);

            return response()->json(['deliveryAmount' => $deliveryAmount, 'grandTotal'  => $grandTotal]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // proceed to payment
    public function proceedToPayment(Request $request)
    {
        try {
            $address = Address::with('delivery')->findOrFail($request->address_id);
            $deliveryCharge = $address->delivery->delivery_charge;
            // $deliveryAreaId = $address->delivery_area_id;
            $selectedAddress = $address->address;

            session()->put('address', $selectedAddress);
            session()->put('deliveryCharge', $deliveryCharge);
            // session()->put('deliveryAreaId', $deliveryAreaId);
            session()->put('addressId', $address->id);

            return response(['redirect_url'     => route('checkout.payment')]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
