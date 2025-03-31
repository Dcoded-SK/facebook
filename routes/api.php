<?php

use App\Http\Controllers\afterlogin\PostController;

Route::prefix("api")->name("api.")->group(function () {
    Route::post('post/comment', [PostController::class, 'setComment'])->name('setComment');
    Route::get("post/comment", [PostController::class, 'getComment'])->name('comment');
});