<?php

use App\Http\Controllers\Admin\NewsletterController;

Route::group([
    'prefix' => 'newsletter',
    'as' => 'newsletter.',
    'middleware' => 'admin',
], function () {
    Route::controller(NewsletterController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
    });
});
