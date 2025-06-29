<?php

use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\afterlogin\HomeController;





Route::prefix('afterlogin')->name('afterlogin.')->middleware(CheckLogin::class)->group(function () {

    Route::get('/home', [HomeController::class, 'home'])->name('home');
});