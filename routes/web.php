<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FertilizationController;
use App\Http\Controllers\FertilizationStockController;
use App\Http\Controllers\PesticideStockController;
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

    Route::prefix('fertilization/stock')->name('fertilization.stock.')->group(function () {
        Route::get('/', [FertilizationStockController::class, 'index'])->name('index');
        Route::get('/create', [FertilizationStockController::class, 'create'])->name('create');
        Route::post('/', [FertilizationStockController::class, 'store'])->name('store');
        Route::get('/{stock}', [FertilizationStockController::class, 'show'])->name('show');
        Route::get('/{stock}/edit', [FertilizationStockController::class, 'edit'])->name('edit');
        Route::put('/{stock}', [FertilizationStockController::class, 'update'])->name('update');
        Route::delete('/{stock}', [FertilizationStockController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('spraying/stock')->name('spraying.stock.')->group(function () {
        Route::get('/', [PesticideStockController::class, 'index'])->name('index');
        Route::get('/create', [PesticideStockController::class, 'create'])->name('create');
        Route::post('/', [PesticideStockController::class, 'store'])->name('store');
        Route::get('/{stock}', [PesticideStockController::class, 'show'])->name('show');
        Route::get('/{stock}/edit', [PesticideStockController::class, 'edit'])->name('edit');
        Route::put('/{stock}', [PesticideStockController::class, 'update'])->name('update');
        Route::delete('/{stock}', [PesticideStockController::class, 'destroy'])->name('destroy');
    });

    Route::resource('fertilization', FertilizationController::class);
    Route::resource('spraying', SprayingController::class);
    Route::resource('prunning', PruningController::class);
    Route::resource('user', UserController::class);
});
