<?php

use App\Http\Controllers\Frontend\CartController;

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::controller(CartController::class)->group(function () {
        Route::post('/add', 'cartAdd')->name('add');
        Route::get('/items', 'cartItems')->name('items');
        Route::get('/remove/items/{rowId}', 'removeCartItem')->name('remove.item');
        Route::get('/clear}', 'clearCart')->name('clear');

        // cart page
        Route::get('/page', 'cartPage')->name('page');

        Route::post('/quantity/update', 'cartQuantityUpdate')->name('quantity.update');

        // coupon apply
        Route::post('/coupon/apply', 'cartCouponApply')->name('coupon.apply');
        Route::post('/coupon/remove', 'cartCouponRemove')->name('coupon.remove');
    });
});
