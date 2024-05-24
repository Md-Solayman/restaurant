<?php

use App\Http\Controllers\Admin\PaymentSettingsController;

Route::group(['prefix' => 'payment_settings', 'as' => 'payment_settings.'], function () {
    Route::controller(PaymentSettingsController::class)->group(function () {
        Route::get('/', 'paymentSettings')->name('index');
        Route::post('paypal/store', 'paypalPaymentSettingsStore')->name('paypal.store');
        Route::post('stripe/store', 'stripePaymentSettingsStore')->name('stripe.store');
        Route::post('razorpay/store', 'razorpayPaymentSettingsStore')->name('razorpay.store');
    });
});
