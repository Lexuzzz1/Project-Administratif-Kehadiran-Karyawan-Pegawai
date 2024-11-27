<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  // Untuk logging error
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    // Fungsi untuk mengambil semua data absensi dengan paginasi
    public function index()
    {
        try {
            // Menggunakan paginasi 10 data per halaman
            $absensi = Absensi::paginate(10); // Ambil data absensi dengan paginasi
            
            return view('absensi.index', compact('absensi')); // Kirim data ke view index
        } catch (\Exception $e) {
            Log::error('Error retrieving absensi data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data.'
            ], 500);
        }
    }

    // Fungsi untuk mengambil data absensi berdasarkan id_karyawan
    public function show($id_karyawan)
    {
        try {
            $absensi = Absensi::where('id_karyawan', $id_karyawan)->get();

            if ($absensi->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data absensi untuk karyawan ini tidak ditemukan.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $absensi
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error retrieving absensi for karyawan ' . $id_karyawan . ': ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data.'
            ], 500);
        }
    }

    // Fungsi untuk menyimpan data absensi
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'id_karyawan' => 'required|integer',
                'waktu_masuk' => 'required|date_format:Y-m-d H:i:s',
                'jenis_presensi' => 'required|string|max:255',
                'status' => 'required|string|max:50',
                'approval' => 'nullable|string|max:50',
            ]);

            // Menyimpan data absensi baru
            Absensi::create($validated);

            // Redirect dengan pesan sukses
            return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan!');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error storing absensi: ' . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat menyimpan data absensi.');
        }
    }
}
