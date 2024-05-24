<?php

use App\Http\Controllers\Frontend\CustomerOrderController;

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
    Route::controller(CustomerOrderController::class)->group(function () {
        Route::get('/order', 'customerOrder')->name('order');
        Route::get('/order/show/{order}', 'customerOrderShow')->name('order.show');
    });
});
