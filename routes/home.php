<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\afterlogin\HomeController;

Route::prefix('afterlogin')->name('afterlogin.')->group(function () {

    Route::get('/home', [HomeController::class, 'home'])->name('home');
});
