<?php

use App\Http\Controllers\Admin\ReservationTimeController;

Route::group([
    'prefix' => 'reservation_time',
    'as'     => 'reservation_time.',
    'middleware' => 'admin',
], function () {
    Route::controller(ReservationTimeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{reservationtime}', 'edit')->name('edit');
        Route::put('/update/{reservationtime}', 'update')->name('update');
        Route::get('/destroy/{reservationtime}', 'destroy')->name('destroy');
    });
});
