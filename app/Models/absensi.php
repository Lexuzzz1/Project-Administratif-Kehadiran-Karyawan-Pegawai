<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';

    protected $fillable = [
        'absen_id',
        'id_karyawan',
        'waktu_masuk',
        'waktu_keluar',
        'jenis_presensi',
        'status',
        'approval'
    ];

    protected $primaryKey = 'absen_id';

    public $incrementing =false;
    protected $keyType='string';

}
