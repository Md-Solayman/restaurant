<?php

use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\PaymentController;

Route::group(['prefix' => 'checkout', 'as' => 'checkout.', 'middleware' => 'auth'], function () {
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/', 'checkout')->name('index');

        // delivery
        Route::post('/delivery', 'checkoutDelivery')->name('delivery');


        // proceed to payment
        Route::post('/proceed/payment', 'proceedToPayment')->name('proceed.payment');
    });


    // payment controller
    Route::controller(PaymentController::class)->group(function () {

        // payment
        Route::get('/payment', 'payment')->name('payment');
        Route::post('/make/payment', 'makePayment')->name('make.payment');
    });
});
