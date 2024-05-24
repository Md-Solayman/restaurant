<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;


Route::group([
    'prefix' => 'coupon',
    'as' => 'coupon.',
    'middleware' => 'admin',
], function () {
    Route::controller(CouponController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{coupon}', 'edit')->name('edit');
        Route::put('/update/{coupon}', 'update')->name('update');
        Route::get('/destroy/{coupon}', 'destroy')->name('destroy');
        Route::get('/show/{coupon}', 'show')->name('show');
    });
});
