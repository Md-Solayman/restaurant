<?php

use App\Http\Controllers\Admin\ReservationController;

Route::group([
    'prefix' => 'reservation',
    'as'     => 'reservation.',
    'middleware' => 'admin',
], function () {
    Route::controller(ReservationController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
        Route::get('/destroy/{reservation}', 'destroy')->name('destroy');
    });
});
