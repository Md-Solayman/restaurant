<?php

use App\Http\Controllers\Admin\GeneralSettingsController;

Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
    Route::controller(GeneralSettingsController::class)->group(function () {
        Route::get('/', 'generalSettings')->name('index');

        Route::post('/store', 'generalSettingsStore')->name('store');

        Route::post('/pusher/store', 'pusherSettingsStore')->name('pusher.store');

        Route::post('/mail/store', 'mailSettingsStore')->name('mail.store');

        Route::post('/logo/store', 'logoSettingsStore')->name('logo.store');

        Route::post('/other/store', 'otherSettingsStore')->name('other.store');
    });
});
