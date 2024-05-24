<?php

use App\Http\Controllers\Admin\ChefController;

Route::group([
    'prefix' => 'chef',
    'as' => 'chef.',
    'middleware' => 'admin',
], function () {
    Route::controller(ChefController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{chef}', 'edit')->name('edit');
        Route::put('/update/{chef}', 'update')->name('update');
        Route::get('/destroy/{chef}', 'destroy')->name('destroy');
        Route::get('/show/{chef}', 'show')->name('show');
    });
});
