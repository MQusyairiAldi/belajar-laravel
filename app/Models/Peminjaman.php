<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman'; // Ensure it matches your table name in the database

    protected $fillable =[
        'tanggal_pinjam','tanggal_kembali','id_buku','id_user','status'
    ];

    public $timestamps = false;
}
