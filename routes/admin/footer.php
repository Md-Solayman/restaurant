<?php

use App\Http\Controllers\Admin\FooterController;

Route::group([
    'prefix'    => 'footer',
    'as'        => 'footer.',
    'middleware' => 'admin',
], function () {
    Route::controller(FooterController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
