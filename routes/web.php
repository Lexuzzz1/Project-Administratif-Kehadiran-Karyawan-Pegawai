<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\QRCodeController;

// Route untuk menampilkan daftar absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');

// Route untuk menyimpan data absensi
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

// Route untuk menampilkan halaman generate QR Code
Route::get('/scan', [QRCodeController::class, 'scan'])->name('absensi.scan');

// Route untuk memproses dan menampilkan QR Code yang di-generate
Route::post('/generate', [QRCodeController::class, 'generateQrCode'])->name('qrCode.generateQrCode');