<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\QRCodeController;

// Route untuk menampilkan daftar absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');

// Route untuk menyimpan data absensi manual
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

// Route untuk scan QR Code
Route::get('/scan', [QRCodeController::class, 'scan'])->name('absensi.scan');

// Route untuk generate QR Code
Route::post('/generate', [QRCodeController::class, 'generateQRCode'])->name('qrCode.generateQRCode');

// Route untuk presensi melalui QR Code
Route::get('/presensi/{id_karyawan}', [AbsensiController::class, 'presensi'])->name('absensi.presensi');
