<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan daftar karyawan
        return view('karyawan.index');
    }
}
