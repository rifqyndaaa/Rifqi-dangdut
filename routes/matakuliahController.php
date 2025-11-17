use App\Http\Controllers\MatakuliahController;

// Route untuk menampilkan daftar matakuliah
Route::get('/matakuliah', [MatakuliahController::class, 'index']);

// Route untuk menampilkan matakuliah berdasarkan kode
Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);
