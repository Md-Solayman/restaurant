<?php


use App\Http\Controllers\Frontend\ReservationController;

Route::group(['prefix' => 'reservation', 'as' => 'reservation.'], function () {
    Route::controller(ReservationController::class)->group(function () {
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'list')->name('list');
    });
});
