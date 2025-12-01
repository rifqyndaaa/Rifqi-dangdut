<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MultipleUploadController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ===================== AUTH ROUTES =====================
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ===================== PROTECTED ROUTES =====================
Route::middleware('checkislogin')->group(function () {

    // ----- DASHBOARD -----
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // ----- USER MANAGEMENT -----
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');

        Route::group(['middleware' => ['checkrole:Super Admin']], function () {
            Route::get('user', [UserController::class, 'index'])->name('user.list');
            /** List Route Latnnya */
        });
    });

    // ----- PELANGGAN -----
 Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('/create', [PelangganController::class, 'create'])->name('create');
    Route::post('/', [PelangganController::class, 'store'])->name('store');
    Route::get('/{pelanggan}', [PelangganController::class, 'show'])->name('show'); // <- show route
    Route::get('/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/{pelanggan}', [PelangganController::class, 'update'])->name('update');
    Route::delete('/{pelanggan}', [PelangganController::class, 'destroy'])->name('destroy');
    });

    // ----- MULTIPLE UPLOAD -----
    Route::prefix('multiple-upload')->name('multipleupload.')->group(function () {
        Route::post('/', [MultipleUploadController::class, 'store'])->name('store');
        Route::delete('/{id}', [MultipleUploadController::class, 'destroy'])->name('destroy');
    });

});
