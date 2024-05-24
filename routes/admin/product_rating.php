<?php

use App\Http\Controllers\Admin\ProductRatingController;


Route::group([
    'prefix'        => 'product_rating',
    'as'            => 'product_rating.',
    'middleware'    => 'admin',
], function () {
    Route::controller(ProductRatingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/status/{productRatingId}', 'statusUpdate')->name('status');

        Route::get('/destroy/{productRatingId}', 'destroy')->name('destroy');
        Route::get('/show/{productRatingId}', 'show')->name('show');
    });
});
