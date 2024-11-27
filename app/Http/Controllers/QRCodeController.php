<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    // Menampilkan halaman untuk generate QR Code
    public function showGenerateForm()
    {
        return view('qr.generate'); // Menampilkan form untuk input data QR Code
    }

    // Menghasilkan QR Code berdasarkan data yang dimasukkan oleh pengguna
    public function generateQRCode(Request $request)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'data' => 'required|string|max:255', // Menjamin input adalah string yang valid
        ]);

        // Ambil data dari input form
        $data = $validatedData['data'];

        // Generate QR Code dengan data yang diberikan
        $qrCode = QrCode::size(300)->generate($data);

        // Kirim QR Code ke view untuk ditampilkan
        return view('qr.generate', compact('qrCode', 'data'));
    }

    // Menampilkan halaman scan QR Code
    public function scan()
    {
        return view('qr.scan');  // Halaman untuk scan QR
    }
}
