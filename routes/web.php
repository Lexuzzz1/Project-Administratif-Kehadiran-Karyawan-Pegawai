<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IzinCutiController;

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

// Routes untuk pengajuan izin cuti
Route::get('/izin-cuti', [IzinCutiController::class, 'create'])->name('izin_cuti.create');
Route::post('/izin-cuti', [IzinCutiController::class, 'store'])->name('izin_cuti.store');
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');

