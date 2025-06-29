<?php

use App\Http\Controllers\afterlogin\PostController;
use App\Http\Controllers\afterlogin\StoryController;

Route::prefix("api")->name("api.")->group(function () {
    Route::post('post/comment', [PostController::class, 'setComment'])->name('setComment');
    Route::get("post/comment", [PostController::class, 'getComment'])->name('comment');




})->middleware('CheckLogin');

Route::prefix('story')->name('story.')->group(function () {

    Route::post('create', [StoryController::class, 'create'])->name('create');
    Route::get('view-{id}', [StoryController::class, 'view'])->name('view');
})->middleware('CheckLogin');