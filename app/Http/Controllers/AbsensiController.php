<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\Karyawan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = absensi::all();
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
                ->whereDate('absensi.waktu_masuk', $today);
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


    public function store(Request $request)
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

        $tahun = strval(date('y'));
        $bulan = strval(date('m'));
        $hari = strval(date('d'));

        $header = 'A-' . $hari . $bulan . $tahun;

        foreach ($data['attendance'] as $dataAbsen) {
            $id = IdGenerator::generate(['table' => 'absensi', 'field' => 'absensi_id', 'length' => 10, 'prefix' => $header]);
            $absen = new absensi();
            $absen->absensi_id = $id;
            $absen->id_karyawan = $dataAbsen['id_karyawan'];
            $absen->waktu_masuk = now();
            $absen->jenis_presensi = 'onsite';
            $absen->status = $dataAbsen['status'];
            $absen->approval = 1;
            $absen->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('rekapAll');
    }

    public function update(absensi $absensi)
    {
        if (!$absensi) {
            return redirect()->back()->with('error', 'Data absensi tidak ditemukan.');
        }

        // Update waktu keluar dengan waktu sekarang menggunakan Carbon
        $absensi->waktu_keluar = now(); // Anda bisa menggunakan format yang sesuai jika diperlukan
        $absensi->save(); // Simpan perubahan ke database

        return redirect()->route('rekapAll');
    }
}
