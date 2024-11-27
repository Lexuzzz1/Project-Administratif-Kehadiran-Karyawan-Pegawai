<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IzinCutiController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin')->middleware('userAccess:admin');
    Route::get('/manajer', [UserController::class, 'index'])->name('manajer')->middleware('userAccess:manajer');
    Route::get('/pegawai', [UserController::class, 'index'])->name('pegawai')->middleware('userAccess:pegawai');
    Route::get('/logout', [LoginController::class, 'logout']);
});

// Routes untuk pengajuan izin cuti
Route::get('/izin-cuti', [IzinCutiController::class, 'create'])->name('izin_cuti.create');
Route::post('/izin-cuti', [IzinCutiController::class, 'store'])->name('izin_cuti.store');
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');

Route::get('/izin-cuti/index', [IzinCutiController::class, 'index'])->name('izin_cuti.index');
Route::get('/izin-cuti/{id}/edit', [IzinCutiController::class, 'edit'])->name('izin_cuti.edit');
Route::put('/izin-cuti/{id}', [IzinCutiController::class, 'update'])->name('izin_cuti.update');
Route::delete('/izin-cuti/{id}', [IzinCutiController::class, 'destroy'])->name('izin_cuti.destroy');
