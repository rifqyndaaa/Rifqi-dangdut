<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MultipleUploadController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

// Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);
// Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: ' . $param1;
});
Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: ' . $param1;
});
Route::get('/about', function () {
    return view('halaman-about');
});
Route::get('/home', [HomeController::class, 'index']);

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('pelanggan', PelangganController::class);

// route('pelanggan.update', $dataPelanggan->pelanggan_id)


Route::resource('user', UserController::class);

// Routes untuk multiple upload
Route::post('/multiple-upload', [App\Http\Controllers\MultipleUploadController::class, 'store'])->name('multipleupload.store');
Route::delete('/multiple-upload/{id}', [App\Http\Controllers\MultipleUploadController::class, 'destroy'])->name('multipleupload.destroy');

// Route untuk show detail pelanggan
Route::get('/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'show'])->name('pelanggan.show');
// Route untuk show detail pelanggan (jika belum ada)
Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
