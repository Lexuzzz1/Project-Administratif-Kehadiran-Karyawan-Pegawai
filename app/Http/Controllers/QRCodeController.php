<?php

namespace App\Http\Controllers;

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
        // Validasi inputan untuk nama
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',  // Validasi nama
        ]);

        // Mengambil data nama yang diinputkan
        $name = $validatedData['name'];

        
        $idKaryawan = rand(1000, 9999);

        // Membuat URL untuk presensi dengan nama karyawan
        $presensiUrl = url('/presensi/' . urlencode($name));  // Menggunakan nama yang diinputkan

        // Menghasilkan QR Code dengan URL presensi
        $qrCode = QrCode::size(300)->generate($presensiUrl);

        // Mengirim QR Code, nama dan ID Karyawan ke view
        return view('qr.generate', compact('qrCode', 'name', 'idKaryawan'));
    }

    // Menampilkan halaman scan QR Code
    public function scan()
    {
        return view('qr.scan'); // Pastikan file `scan.blade.php` tersedia di direktori `resources/views/qr`
    }
}
