<?php

use App\Http\Controllers\afterlogin\StoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('story')->name('story.')->group(function () {

    Route::post('create', [StoryController::class, 'create'])->name('create');
});