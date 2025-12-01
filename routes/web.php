<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MultipleUploadController;

// route('pelanggan.update', $dataPelanggan->pelanggan_id)
Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::post('auth/login', [AuthController::class, 'login'])
    ->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ROUTES LAIN
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);

// MULTIPLE UPLOAD
Route::post('/multiple-upload', [MultipleUploadController::class, 'store'])->name('multipleupload.store');
Route::delete('/multiple-upload/{id}', [MultipleUploadController::class, 'destroy'])->name('multipleupload.destroy');
