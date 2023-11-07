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
        Schema::create('tabel_dosen', function (Blueprint $tabel) {
            $tabel->id();
            $tabel->string('gambar');
            $tabel->string('id_dosen');
            $tabel->string('nama');
            $tabel->date('tanggal_lahir');
            $tabel->string('jurusan');
            $tabel->string('no_hp');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_dosen');
    }
};
