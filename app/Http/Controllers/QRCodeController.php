<?php

namespace App\Http\Controllers;

use App\Models\Karyawan; // Pastikan model Karyawan sudah ada
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    // Menampilkan halaman untuk generate QR Code
    public function showGenerateForm()
    {
        return view('qr.generate');  // Pastikan view 'qr.generate' sudah tersedia
    }

    // Menghasilkan QR Code
    public function generateQRCode(Request $request)
    {
        // Validasi input untuk nama
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',  // Validasi nama
        ]);

        // Ambil data nama yang diinputkan
        $name = $validatedData['name'];

        // Cari karyawan berdasarkan kolom 'nama' di database
        $karyawan = Karyawan::where('nama', $name)->first();

        // Jika karyawan tidak ditemukan, kembalikan error
        if (!$karyawan) {
            return redirect()->back()->withErrors(['name' => 'Karyawan tidak ditemukan.']);
        }

        // Ambil karyawan_id dari database (pastikan 'karyawan_id' adalah kolom yang benar)
        $karyawan_id = $karyawan->karyawan_id;

        // Membuat URL untuk presensi menggunakan ID karyawan
        $presensiUrl = url('/presensi/' . urlencode($karyawan_id));

        // Generate QR Code dengan URL presensi
        $qrCode = QrCode::size(300)->generate($presensiUrl);

        // Mengirim QR Code, nama, dan ID karyawan ke view
        return view('qr.generate', [
            'qrCode' => $qrCode,
            'name' => $name,
            'karyawan' => $karyawan->karyawan_id,  // Menggunakan karyawan_id
            'jabatan' => $karyawan->id_jabatan, 
            'golongan' => $karyawan->id_golongan,
            'departemen' => $karyawan->id_departemen,
            'alamat' => $karyawan->alamat,
            'email' => $karyawan->email,
            'no_telepon' => $karyawan->no_telepon
        ]);
    }

    // Menampilkan halaman scan QR Code
    public function scan()
    {
        return view('qr.scan'); // Pastikan file `scan.blade.php` tersedia di direktori `resources/views/qr`
    }
}
