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

Route::middleware(['role:admin|manager|assistant|krani'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Fertilization Routes
    Route::prefix('fertilization')->name('fertilization.')->group(function () {
        // Fertilization Stock
        Route::prefix('stock')->name('stock.')->group(function () {
            Route::get('/', [FertilizationStockController::class, 'index'])->name('index');

            Route::middleware('role:admin|krani')->group(function () {
                Route::get('/create', [FertilizationStockController::class, 'create'])->name('create');
                Route::post('/', [FertilizationStockController::class, 'store'])->name('store');
                Route::get('/{stock}', [FertilizationStockController::class, 'show'])->name('show');
                Route::get('/{stock}/edit', [FertilizationStockController::class, 'edit'])->name('edit');
                Route::put('/{stock}', [FertilizationStockController::class, 'update'])->name('update');
                Route::delete('/{stock}', [FertilizationStockController::class, 'destroy'])->name('destroy');
            });
        });

        // Fertilization Main
        Route::get('/', [FertilizationController::class, 'index'])->name('index');
        Route::get('/export', [FertilizationController::class, 'exportFertilization'])->name('export');

        Route::middleware('role:admin|krani')->group(function () {
            Route::get('/create', [FertilizationController::class, 'create'])->name('create');
            Route::post('/', [FertilizationController::class, 'store'])->name('store');
            Route::get('/{fertilization}', [FertilizationController::class, 'show'])->name('show');
            Route::get('/{fertilization}/edit', [FertilizationController::class, 'edit'])->name('edit');
            Route::put('/{fertilization}', [FertilizationController::class, 'update'])->name('update');
            Route::delete('/{fertilization}', [FertilizationController::class, 'destroy'])->name('destroy');
        });
    });

    // Spraying Routes
    Route::prefix('spraying')->name('spraying.')->group(function () {
        // Spraying Stock
        Route::prefix('stock')->name('stock.')->group(function () {
            Route::get('/', [PesticideStockController::class, 'index'])->name('index');

            Route::middleware('role:admin|krani')->group(function () {
                Route::get('/create', [PesticideStockController::class, 'create'])->name('create');
                Route::post('/', [PesticideStockController::class, 'store'])->name('store');
                Route::get('/{stock}', [PesticideStockController::class, 'show'])->name('show');
                Route::get('/{stock}/edit', [PesticideStockController::class, 'edit'])->name('edit');
                Route::put('/{stock}', [PesticideStockController::class, 'update'])->name('update');
                Route::delete('/{stock}', [PesticideStockController::class, 'destroy'])->name('destroy');
            });
        });

        // Spraying Main
        Route::get('/', [SprayingController::class, 'index'])->name('index');
        Route::get('/export', [SprayingController::class, 'exportSpraying'])->name('export');

        Route::middleware('role:admin|krani')->group(function () {
            Route::get('/create', [SprayingController::class, 'create'])->name('create');
            Route::post('/', [SprayingController::class, 'store'])->name('store');
            Route::get('/{spraying}', [SprayingController::class, 'show'])->name('show');
            Route::get('/{spraying}/edit', [SprayingController::class, 'edit'])->name('edit');
            Route::put('/{spraying}', [SprayingController::class, 'update'])->name('update');
            Route::delete('/{spraying}', [SprayingController::class, 'destroy'])->name('destroy');
        });
    });

    // Pruning Routes
    Route::prefix('prunning')->name('prunning.')->group(function () {
        Route::get('/', [PruningController::class, 'index'])->name('index');
        Route::get('/export', [PruningController::class, 'exportPruning'])->name('export');

        Route::middleware('role:admin|krani')->group(function () {
            Route::get('/create', [PruningController::class, 'create'])->name('create');
            Route::post('/', [PruningController::class, 'store'])->name('store');
            Route::get('/{prunning}', [PruningController::class, 'show'])->name('show');
            Route::get('/{prunning}/edit', [PruningController::class, 'edit'])->name('edit');
            Route::put('/{prunning}', [PruningController::class, 'update'])->name('update');
            Route::delete('/{prunning}', [PruningController::class, 'destroy'])->name('destroy');
        });
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('user', UserController::class);
    });
});
