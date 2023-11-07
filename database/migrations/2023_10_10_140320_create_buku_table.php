<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(){
        Schema::create('bukus',function(Blueprint $tabel){
            $tabel->id();
            $tabel->string('gambar');
            $tabel->string('kode_buku');
            $tabel->string('judul_buku');
            $tabel->string('penulis');
            $tabel->string('penerbit');
            $tabel->string('katagori');
            $tabel->longText('deskripsi');
            $tabel->date('tahun_terbit')->nullabel();
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
