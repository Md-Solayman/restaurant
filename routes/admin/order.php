<?php

use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\OrderController;

Route::group([
    'prefix' => 'order',
    'as' => 'order.',
    'middleware' => 'admin',
], function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/pending', 'pendingOrder')->name('pending');
        Route::get('/declined', 'declinedOrder')->name('declined');
        Route::get('/processed', 'processedOrder')->name('processed');
        Route::get('/delivered', 'deliveredOrder')->name('delivered');


        Route::get('/destroy/{order}', 'destroy')->name('destroy');
        Route::get('/show/{order}', 'show')->name('show');

        // update status
        Route::get('/status/{orderId}', 'orderStatus')->name('status');

        Route::post('/status/update/{order}', 'orderStatusUpdate')->name('status.update');
    });
});
