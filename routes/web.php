<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//guest
Route::middleware('guest')->group(function () {
    //register
    Route::get('register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);

    //login
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

//login required
Route::middleware('auth')->group(function() {
    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});