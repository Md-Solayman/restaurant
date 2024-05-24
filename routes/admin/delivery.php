<?php

use App\Http\Controllers\Admin\DeliveryAreaController;


Route::group([
    'prefix' => 'delivery',
    'as' => 'delivery.',
    'middleware' => 'admin',
], function () {
    Route::controller(DeliveryAreaController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{deliveryarea}', 'edit')->name('edit');
        Route::put('/update/{deliveryarea}', 'update')->name('update');
        Route::get('/destroy/{deliveryarea}', 'destroy')->name('destroy');
        Route::get('/show/{deliveryarea}', 'show')->name('show');
    });
});
