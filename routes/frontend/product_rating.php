<?php

use App\Http\Controllers\Frontend\ProductRatingController;

Route::group(['prefix' => 'product_rating', 'as' => 'product_rating.'], function () {
    Route::controller(ProductRatingController::class)->group(function () {
        Route::post('/store', 'productRatingStore')->name('store');
    });
});
