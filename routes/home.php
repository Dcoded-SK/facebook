<?php

use App\Http\Controllers\aftelogin\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('afterlogin')->name('afterlogin.')->group(function () {

    Route::get('/home', [HomeController::class, 'home'])->name('home');

});