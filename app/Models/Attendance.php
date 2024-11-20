<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances'; // Nama tabel yang benar
    protected $primaryKey = 'id'; // Primary key tabel

    protected $fillable = ['employee_id', 'check_in']; // Kolom yang dapat diisi
}
