<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});
// Route untuk menampilkan semua karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');

// Route untuk menampilkan form tambah karyawan
Route::match(['get', 'post'], '/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');

// Route untuk menampilkan form edit karyawan
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');

// Route untuk mengupdate karyawan
Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');

// Route untuk menampilkan konfirmasi hapus karyawan
Route::get('/karyawan/delete/{id}', [KaryawanController::class, 'confirmDelete'])->name('karyawan.confirmDelete');

// Route untuk menghapus karyawan
Route::post('/karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');

Route::get('/manajer', function () {
    return view('manajer/index');
});

Route::get('/rekap', function () {
    return view('manajer/rekap');
});