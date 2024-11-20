<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AbsensiController extends Controller
{
    // Menampilkan halaman daftar absensi
    public function index()
    {
        $attendance = Attendance::all();  // Mengambil semua data absensi dari tabel 'attendances'
        return view('absensi.index', compact('attendance'));
    }

    // Menampilkan halaman form tambah absensi
    public function create()
    {
        return view('absensi.absensi');
    }

    // Menyimpan data absensi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'employee_id' => 'required|integer',
            'check_in' => 'required|date',
        ]);

        // Simpan data absensi ke tabel 'attendances'
        $attendance = new Attendance();
        $attendance->employee_id = $request->employee_id;
        $attendance->check_in = $request->check_in;
        $attendance->save();

        return redirect()->route('attendance.index')->with('success', 'Absensi berhasil disimpan!');
    }
}
