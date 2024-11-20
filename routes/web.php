<?php

use App\Http\Controllers\AbsensiController;

// Route untuk menampilkan daftar absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');

// Route untuk menampilkan halaman scan QR untuk presensi
Route::get('/scan', [AbsensiController::class, 'scanQR'])->name('absensi.scan');

// Route untuk menyimpan data absensi
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
