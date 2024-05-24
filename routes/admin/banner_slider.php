<?php

use App\Http\Controllers\Admin\BannerSliderController;


Route::group([
    'prefix' => 'banner_slider',
    'as' => 'banner_slider.',
    'middleware' => 'admin',
], function () {
    Route::controller(BannerSliderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{bannerslider}', 'edit')->name('edit');
        Route::put('/update/{bannerslider}', 'update')->name('update');
        Route::get('/destroy/{bannerslider}', 'destroy')->name('destroy');
    });
});
