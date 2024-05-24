<?php

use App\Http\Controllers\Admin\AppBannerController;


Route::group([
    'prefix' => 'app_banner',
    'as' => 'app_banner.',
    'middleware' => 'admin',
], function () {
    Route::controller(AppBannerController::class)->group(function () {
        // Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/destroy/{appbanner}', 'destroy')->name('destroy');
    });
});
