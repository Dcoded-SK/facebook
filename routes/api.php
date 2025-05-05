<?php

use App\Http\Controllers\afterlogin\PostController;
use App\Http\Controllers\afterlogin\StoryController;

Route::prefix("api")->name("api.")->group(function () {
    Route::post('post/comment', [PostController::class, 'setComment'])->name('setComment');
    Route::get("post/comment", [PostController::class, 'getComment'])->name('comment');




});

Route::prefix('story')->name('story.')->group(function () {

    Route::post('create', [StoryController::class, 'create'])->name('create');
});