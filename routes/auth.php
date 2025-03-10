<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'loginView'])->name('login.view');

Route::post('/login', [AuthController::class, 'loginMethod'])->name('login.method');


Route::post('/register', [AuthController::class, 'registerMethod'])->name('register.method');

Route::get('/forgot', [AuthController::class, 'forgotPasswordView'])->name('forgot.password.view');



Route::get('/logout', [AuthController::class, 'logoutMethod'])->name('logout.method');
