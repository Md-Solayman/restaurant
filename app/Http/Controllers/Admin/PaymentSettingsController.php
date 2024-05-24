<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentSetting;
use App\Services\PaymentSettingsService;
use Illuminate\Http\Request;

class PaymentSettingsController extends Controller
{
    public function paymentSettings()
    {
        try {
            $paymentSettings = PaymentSetting::pluck('value', 'key')->toArray();

            return view('admin.payment_settings.index', [
                'paymentSettings' => $paymentSettings,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // paypal payment settings
    public function paypalPaymentSettingsStore(Request $request)
    {

        $data = $request->validate([
            'paypal_status'                 => ['required', 'boolean'],
            'paypal_account_mode'           => ['required', 'in:sandbox,live'],
            'paypal_currency_name'          => ['required'],
            'paypal_country_name'           => ['required'],
            'paypal_currency_rate'          => ['required', 'numeric'],
            'paypal_api_key'                => ['required'],
            'paypal_secret_key'             => ['required'],
            'paypal_app_id'                 => ['required'],

        ]);


        try {

            if ($request->hasFile('paypal_logo')) {
                $request->validate([
                    'paypal_logo' => ['required', 'image'],
                ]);


                $imagePath = Helper::image($request->paypal_logo, '/uploads/payment/');

                PaymentSetting::UpdateOrCreate(
                    ['key'      => 'paypal_logo'],
                    ['value'    => $imagePath],
                );
            }


            foreach ($data as $key => $value) {
                PaymentSetting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value],
                );
            }



            // clear cache
            $settings = app(PaymentSettingsService::class);
            $settings->clearCache();


            $notification = array(
                'alert-type'        => 'success',
                'message'           => 'Payment Settings Updated'
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }




    // stripe payment settings
    public function stripePaymentSettingsStore(Request $request)
    {
        $data = $request->validate([
            'stripe_status'                 => ['required', 'boolean'],
            'stripe_country_name'           => ['required'],
            'stripe_currency_name'          => ['required'],
            'stripe_api_key'                => ['required'],
            'stripe_secret_key'             => ['required'],
            'stripe_currency_rate'          => ['required', 'numeric'],
        ]);


        try {

            if ($request->hasFile('stripe_logo')) {
                $request->validate([
                    'stripe_logo' => ['required', 'image']
                ]);

                $imagePath = Helper::image($request->stripe_logo, '/uploads/payment');

                PaymentSetting::updateOrCreate(
                    ['key'  => 'stripe_logo'],
                    ['value' => $imagePath],
                );
            }

            foreach ($data as $key => $value) {
                PaymentSetting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }

            // clear cache
            $settings = app(PaymentSettingsService::class);
            $settings->clearCache();


            $notification = array(
                'alert-type'        => 'success',
                'message'           => 'Payment Settings Updated'
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    // razorpay payment settings
    public function razorpayPaymentSettingsStore(Request $request)
    {

        $data = $request->validate([
            'razorpay_status'           => ['required', 'boolean'],
            'razorpay_currency_name'    => ['required'],
            'razorpay_country_name'     => ['required'],
            'razorpay_currency_rate'    => ['required', 'numeric'],
            'razorpay_api_key'          => ['required'],
            'razorpay_secret_key'       => ['required'],
        ]);


        try {

            if ($request->hasFile('razorpay_logo')) {
                $request->validate([
                    'razorpay_logo' => ['required', 'image'],
                ]);

                $imagePath = Helper::image($request->razorpay_logo, '/uploads/payment/');


                PaymentSetting::updateOrCreate(
                    ['key'      => 'razorpay_logo'],
                    ['value'    => $imagePath]
                );
            }


            foreach ($data as $key => $value) {
                PaymentSetting::updateOrCreate(
                    ['key'      => $key],
                    ['value'    => $value]
                );
            }


            // clear cache
            $settings = app(PaymentSettingsService::class);
            $settings->clearCache();


            $notification = array(
                'alert-type'        => 'success',
                'message'           => 'Payment Settings Updated'
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
