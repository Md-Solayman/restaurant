<?php

use App\Http\Controllers\Frontend\SubscribeController;

Route::group(['prefix' => 'subscribe', 'as' => 'subscribe.'], function () {
    Route::controller(SubscribeController::class)->group(function () {
        Route::post('/store', 'store')->name('store');
    });
});
