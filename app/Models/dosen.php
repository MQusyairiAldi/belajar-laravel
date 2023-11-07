<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'gambar', 'id_dosen', 'nama', 'tanggal_lahir', 'jurusan', 'no_hp'
    ];

    public $timestamps = false; // Menonaktifkan kolom 'updated_at' dan 'created_at'
}

