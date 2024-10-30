<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinCuti extends Model
{
    use HasFactory;

    protected $table = 'izin_cuti'; // Tentukan nama tabel jika tidak sesuai default

    protected $fillable = [
        'name',
        'department',
        'position',
        'alasan_izin',
        'tanggal_awal',
        'tanggal_akhir',
        'berkas'
    ];
}
