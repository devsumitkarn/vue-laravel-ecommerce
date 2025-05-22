<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');