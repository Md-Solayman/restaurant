<?php

use App\Http\Controllers\Admin\CounterController;


Route::group([
    'prefix' => 'counter',
    'as' => 'counter.',
    'middleware' => 'admin',
], function () {
    Route::controller(CounterController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
