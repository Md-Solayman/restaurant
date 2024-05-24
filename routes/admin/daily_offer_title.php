<?php

use App\Http\Controllers\Admin\SectionTitleController;

Route::group([
    'prefix' => 'daily_offer_title',
    'as' => 'daily_offer_title.',
    'middleware' => 'admin',
], function () {
    Route::controller(SectionTitleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
