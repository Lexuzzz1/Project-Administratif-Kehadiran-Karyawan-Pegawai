<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';

    protected $fillable = [
        'id_karyawan',
        'departemen',
        'jabatan',
        'role',
        'golongan',
        'nama',
        'alamat',
        'email',
        'password',
        'no_telepon',
    ];

    protected $primaryKey = 'id_karyawan';

    public $incrementing =false;
    protected $keyType='string';
}
