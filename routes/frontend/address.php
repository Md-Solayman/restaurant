<?php

use App\Http\Controllers\Frontend\AddressController;

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
    Route::controller(AddressController::class)->group(function () {
        Route::get('/address', 'index')->name('address');
        Route::get('/address/create', 'create')->name('address.create');
        Route::post('/address/store', 'store')->name('address.store');
        Route::post('/address/edit', 'edit')->name('address.edit');
        Route::put('/address/update', 'update')->name('address.update');
        Route::get('/address/destroy/{address}', 'destroy')->name('address.destroy');
    });
});
