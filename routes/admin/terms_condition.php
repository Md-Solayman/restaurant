<?php

use App\Http\Controllers\Admin\TermsConditionController;

Route::group(['prefix' => 'terms_condition', 'as' => 'terms_condition.'], function () {
    Route::controller(TermsConditionController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
