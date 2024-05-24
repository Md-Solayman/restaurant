<?php

use App\Http\Controllers\Admin\DailyOfferController;


Route::group([
    'prefix' => 'daily_offer',
    'as' => 'daily_offer.',
    'middleware' => 'admin',
], function () {
    Route::controller(DailyOfferController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{dailyoffer}', 'edit')->name('edit');
        Route::put('/update/{dailyoffer}', 'update')->name('update');
        Route::get('/destroy/{dailyoffer}', 'destroy')->name('destroy');

        Route::get('/search', 'search')->name('search');
    });
});
