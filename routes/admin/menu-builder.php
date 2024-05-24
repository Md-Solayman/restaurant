<?php

use App\Http\Controllers\Admin\MenuBuilderController;


Route::controller(MenuBuilderController::class)->group(function () {
    Route::get('/menu-builder', 'menuBuilder')->name('menu-builder');
});
