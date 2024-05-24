<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Models\Admin\ProductOption;

Route::group([
    'prefix' => 'product',
    'as' => 'product.',
    'middleware' => 'admin',
], function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{product}', 'edit')->name('edit');
        Route::put('/update/{product}', 'update')->name('update');
        Route::get('/destroy/{product}', 'destroy')->name('destroy');
        Route::get('/show/{product}', 'show')->name('show');
        Route::post('/status/{product}', 'productStatus')->name('status');
    });

    Route::controller(ProductGalleryController::class)->group(function () {
        Route::get('/gallery/{id}', 'productGallery')->name('gallery');
        Route::post('/gallery/store/{id}', 'productGalleryStore')->name('gallery.store');
        Route::get('/gallery/destroy/{productgallery}', 'productGallerydestroy')->name('gallery.destroy');
    });


    Route::controller(ProductVariantController::class)->group(function () {
        Route::get('/variant/{id}', 'productVariant')->name('variant');
        Route::post('/variant/store/{id}', 'productVariantStore')->name('variant.store');
        Route::get('/variant/destroy/{productvariant}', 'productVariantDestroy')->name('variant.destroy');
    });


    Route::controller(ProductOptionController::class)->group(function () {
        Route::get('/option/{id}', 'productOption')->name('option');
        Route::post('/option/store/{id}', 'productOptionStore')->name('option.store');
        Route::get('/option/destroy/{productoption}', 'productOptionDestroy')->name('option.destroy');
    });
});
