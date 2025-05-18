<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FertilizationController;
use App\Http\Controllers\PruningController;
use App\Http\Controllers\SprayingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/store', 'loginStore')->name('login.store');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('fertilization', FertilizationController::class);
    Route::resource('spraying', SprayingController::class);
    Route::resource('prunning', PruningController::class);
    Route::resource('user', UserController::class);
});
