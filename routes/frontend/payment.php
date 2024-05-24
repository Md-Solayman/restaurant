<?php


use App\Http\Controllers\Frontend\PaypalPaymentController;
use App\Http\Controllers\Frontend\RazorpayPaymentController;
use App\Http\Controllers\Frontend\StripePaymentController;

Route::group(['middleware' => 'auth'], function () {
    // paypal
    Route::controller(PaypalPaymentController::class)->group(function () {
        Route::get('/paypal/payment', 'payWithPaypal')->name('paypal.payment');
        Route::get('/paypal/success', 'paypalSuccess')->name('paypal.success');
        Route::get('/paypal/cancel', 'paypalCancel')->name('paypal.cancel');

        // success and error page
        Route::get('/payment/success', 'paymentSuccess')->name('payment.success');
        Route::get('/payment/error', 'paymentError')->name('payment.error');
    });


    // stripe
    Route::controller(StripePaymentController::class)->group(function () {
        Route::get('/stripe/payment', 'payWithStripe')->name('stripe.payment');
        Route::get('/stripe/success', 'stripeSuccess')->name('stripe.success');
        Route::get('/stripe/cancel', 'stripeCancel')->name('stripe.cancel');
    });



    // razorpay
    Route::controller(RazorpayPaymentController::class)->group(function () {
        Route::get('/razorpay-redirect', 'razorPayRedirect')->name('razorpay-redirect');
        Route::post('/razorpay/payment', 'payWithRazorpay')->name('razorpay.payment');
    });
});
