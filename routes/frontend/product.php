<?php

use App\Http\Controllers\Frontend\ProductDetailsController;

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::controller(ProductDetailsController::class)->group(function () {
        Route::get('/details/{slug}', 'productDetails')->name('details');
    });
});
