<?php

use App\Http\Controllers\afterlogin\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix("post")->name('post.')->group(function () {
    Route::post('/', [PostController::class, 'createPost'])->name('store');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
    Route::put('/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
    Route::Post('/reaction', [PostController::class, 'setReaction'])->name('reaction');


})->middleware('CheckLogin');