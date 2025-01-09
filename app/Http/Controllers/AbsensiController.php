<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\Karyawan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = absensi::all()->sortByDesc('waktu_masuk');
        return view('manajer.index', [
            'absensiAll' => $data
        ]);
    }

    public function create()
    {
        $today = date('Y-m-d');

        // Mengambil karyawan yang belum terdaftar di absensi hari ini
        $karyawans = karyawan::leftJoin('absensi', function ($join) use ($today) {
            $join->on('karyawan.id_karyawan', 'absensi.id_karyawan')
                ->whereDate('absensi.waktu_masuk', $today)
                ->whereDate('absensi.waktu_keluar', $today);
        })
            ->whereNull('absensi.id_karyawan') // Menampilkan karyawan yang tidak memiliki absensi pada hari ini
            ->get(['karyawan.*']);        
        
        return view('manajer.create', [
            'karyawans' => $karyawans
        ]);
        // return view('manajer.create', [
        //     'karyawans' => karyawan::all()
        // ]);
    }


    public function store(Request $request, $id = null)
    {
        $data = $request->validate([
            'attendance' => 'required|array',
            'attendance.*.id_karyawan' => 'required|exists:karyawan,id_karyawan',
            'attendance.*.status' => 'required|in:Hadir,Telat,Absen',
        ], [
            'attendance.required' => 'Data attendance tidak ditemukan',
            'attendance.array' => 'Data attendance harus berupa array',
            'attendance.*.id_karyawan.required' => 'Karyawan belum ada yang terpilih',
            'attendance.*.status.required' => 'Status harus dipilih',
            'attendance.*.status.in' => 'Status tidak valid, pilih antara Hadir, Telat, atau Absen',
        ]);

        // dd($data);

        foreach ($data['attendance'] as $dataAbsen) {
            $absen = absensi::where('id_karyawan', $dataAbsen['id_karyawan'])
                ->whereDate('waktu_masuk', date('Y-m-d'))
                ->first();

            if ($absen) {
                // Jika sudah ada, update waktu_keluar
                DB::table('absensi')
                ->where('id_karyawan', $absen->id_karyawan)
                ->where('waktu_masuk', $absen->waktu_masuk)
                ->update(['waktu_keluar' => date('Y-m-d h:i:s')]);
            } else {
                // Jika belum ada, buat data baru
                $absen = new absensi();
                $absen->id_karyawan = $dataAbsen['id_karyawan'];
                $absen->waktu_masuk = date('Y-m-d H:i:s');
                $absen->jenis_presensi = 'onsite';
                $absen->status = $dataAbsen['status'];
                $absen->approval = 1;
                $absen->save();
            }
        }

        // Redirect dengan pesan sukses
        return redirect()->route('rekapAll');
    }

    public function update($id_karyawan, $waktu_masuk)
    {
        if (!$id_karyawan && !$waktu_masuk) {
            return redirect()->back()->with('error', 'Data absensi tidak ditemukan.');
        }

        DB::table('absensi')
            ->where('id_karyawan', $id_karyawan)
            ->where('waktu_masuk', $waktu_masuk)
            ->update(['waktu_keluar' => date('Y-m-d h:i:s')]);


        return redirect()->route('rekapAll');
    }
}
