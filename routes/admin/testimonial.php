<?php

use App\Http\Controllers\Admin\TestimonialController;

Route::group([
    'prefix' => 'testimonial',
    'as' => 'testimonial.',
    'middleware' => 'admin',
], function () {
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{testimonial}', 'edit')->name('edit');
        Route::get('/show/{testimonial}', 'show')->name('show');
        Route::put('/update/{testimonial}', 'update')->name('update');
        Route::get('/destroy/{testimonial}', 'destroy')->name('destroy');

        Route::post('/status/{testimonial}', 'statusUpdate')->name('status');
    });
});
