<?php

use App\Http\Controllers\Admin\CustomPageBuilderController;

Route::group([
    'prefix' => 'custom_page_builder',
    'as'     => 'custom_page_builder.',
    'middleware' => 'admin',
], function () {

    Route::controller(CustomPageBuilderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{custompagebuilder}', 'edit')->name('edit');
        Route::put('/update/{custompagebuilder}', 'update')->name('update');
        Route::get('/show/{custompagebuilder}', 'show')->name('show');
        Route::get('/destroy/{custompagebuilder}', 'destroy')->name('destroy');
    });
});
