<?php

use App\Http\Controllers\Frontend\BlogCommentController;

Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
    Route::controller(BlogCommentController::class)->group(function () {
        Route::post('/store/{blogId}', 'commentStore')->name('store');
    });
});
