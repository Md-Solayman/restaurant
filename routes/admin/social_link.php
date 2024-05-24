<?php

use App\Http\Controllers\Admin\SocialLinkController;

Route::group([
    'prefix'    => 'social_link',
    'as'        => 'social_link.',
    'middleware' => 'admin',
], function () {
    Route::controller(SocialLinkController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
