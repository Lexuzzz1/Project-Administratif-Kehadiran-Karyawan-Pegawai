<?php

namespace App\Http\Controllers;

use App\Models\absensi;
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
}
