<?php

use App\Http\Controllers\Admin\BlogController;

Route::group([
    'prefix' => 'blog',
    'as'     => 'blog.',
    'middleware' => 'admin',
], function () {

    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{blog}', 'edit')->name('edit');
        Route::put('/update/{blog}', 'update')->name('update');
        Route::get('/show/{blog}', 'show')->name('show');
        Route::get('/destroy/{blog}', 'destroy')->name('destroy');

        // comment
        Route::get('/comment', 'comment')->name('comment');
        Route::get('/comment/status/{commentId}', 'commentStatus')->name('comment.status');
        Route::put('/comment/status/update/{commentId}', 'commentStatusUpdate')->name('comment.status.update');
        Route::get('/comment/destroy/{commentId}', 'commentDestroy')->name('comment.destroy');
    });
});
