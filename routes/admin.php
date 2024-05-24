<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->middleware('admin')->name('dashboard');
        Route::get('/login', 'loginPage')->name('login');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('/login/store', 'loginStore')->name('login.store');

        // profile update
        Route::get('/profile', 'profilePage')->name('profile');
        Route::put('/password/update', 'passwordUpdate')->name('password.update');
        Route::put('/info/update', 'infoUpdate')->name('info.update');
        Route::put('/image/update', 'imageUpdate')->name('image.update');
    });
});


require 'admin/index.php';
