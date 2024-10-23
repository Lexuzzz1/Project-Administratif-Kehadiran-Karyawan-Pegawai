<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all(); // Ambil semua data karyawan dari database
        return view('karyawan.index', ['karyawans' => $karyawans]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validasi input
            $request->validate([
                'nama' => 'required|string|max:255',
                'departemen' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'golongan' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'no_hp' => 'required|string|max:15',
            ]);

            Karyawan::create($request->only(['nama', 'departemen', 'jabatan', 'golongan', 'alamat', 'no_hp']));
            return redirect()->route('karyawan.index');
        }

        return view('karyawan.create');
    }

    public function edit($id){
    $karyawan = Karyawan::findOrFail($id); // Ambil karyawan berdasarkan ID
    return view('karyawan.edit', ['karyawan' => $karyawan]); // Kirim karyawan ke view
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->only(['nama', 'departemen', 'jabatan', 'golongan', 'alamat', 'no_hp']));
        return redirect()->route('karyawan.index');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete(); // Hapus karyawan
        return redirect()->route('karyawan.index');
    }

    public function confirmDelete($id)
    {
        $karyawan = Karyawan::findOrFail($id); // Ambil karyawan untuk konfirmasi
        return view('karyawan.delete', ['karyawan' => $karyawan]);
    }
}
