<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IzinCutiController;
use App\Http\Controllers\KaryawanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/absen-manajer', function () {
    return view('manajer/absen');
});

Route::get('/master', function () {
    return view('layouts/master');
});

Route::get('/rekap', function () {
    return view('manajer/rekap');
});

Route::get('rekapAll',[AbsensiController::class,'index'])->name('karyawan.index');