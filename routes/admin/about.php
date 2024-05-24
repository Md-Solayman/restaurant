<?php

use App\Http\Controllers\Admin\AboutController;

Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
    Route::controller(AboutController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
