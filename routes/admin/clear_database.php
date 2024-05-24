<?php

use App\Http\Controllers\Admin\ClearDatabaseController;


Route::group([
    'prefix' => 'clear_database',
    'as' => 'clear_database.',
    'middleware' => 'admin',
], function () {
    Route::controller(ClearDatabaseController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/store', 'store')->name('store');
    });
});
