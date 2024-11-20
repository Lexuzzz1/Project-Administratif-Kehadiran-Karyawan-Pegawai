<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        // Mengambil data absensi dari tabel 'attendances'
        $attendance = Attendance::all();
        return view('absensi.index', compact('attendance'));
    }

    public function scanQR()
    {
        return view('scan');  // Pastikan view scan.blade.php ada
    }

    public function store(Request $request)
    {
        // Menyimpan absensi
        $attendance = new Attendance();
        $attendance->employee_id = $request->employee_id;
        $attendance->check_in = $request->check_in;
        $attendance->save();

        return redirect()->route('absensi.index')->with('success', 'Presensi berhasil!');
    }
}

