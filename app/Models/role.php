<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $table = 'role';

    protected $fillable = [
        'id_role',
        'nama_role',
    ];

    protected $primaryKey = 'id_role';

    public $incrementing =false;
    protected $keyType='string';
}
