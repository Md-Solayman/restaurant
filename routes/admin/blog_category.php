<?php

use App\Http\Controllers\Admin\BlogCategoryController;


Route::group([
    'prefix' => 'blog_category',
    'as'     => 'blog_category.',
    'middleware' => 'admin',
], function () {
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{blogcategory}', 'edit')->name('edit');
        Route::put('/update/{blogcategory}', 'update')->name('update');
        Route::get('/destroy/{blogcategory}', 'destroy')->name('destroy');
    });
});
