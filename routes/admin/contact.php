<?php

use App\Http\Controllers\Admin\ContactController;

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
