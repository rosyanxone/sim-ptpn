<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/store', 'loginStore')->name('login.store');
});

Route::get('/dashboard', function () {
    return view('pages.users.dashboard');
})->middleware('role:admin')->name('dashboard');

Route::get('/dashboard', function () {
    return view('pages.users.dashboard');
})->middleware('role:admin')->name('dashboard');

Route::get('/fertilization', function () {
    return view('pages.users.fertilization.index');
});

Route::get('/fertilization/create', function () {
    return view('pages.users.fertilization.create');
});

Route::get('/fertilization/edit', function () {
    return view('pages.users.fertilization.edit');
});
