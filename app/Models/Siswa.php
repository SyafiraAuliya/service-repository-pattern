<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    protected $fillable = [
        'nama',
        'jurusan'
    ];

    protected $hidden = [
        'created_at',
        'update_at'
    ];

    use HasFactory;
}
 