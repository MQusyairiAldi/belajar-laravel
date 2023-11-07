<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(){
        Schema::create('peminjaman',function(Blueprint $tabel){
            $tabel->id();
            $tabel->date('tanggal_pinjam');
            $tabel->date('tanggal_kembali');
            $tabel->bigInteger('id_buku');
            $tabel->bigInteger('id_user');
            $tabel->string('status');
            $tabel->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
