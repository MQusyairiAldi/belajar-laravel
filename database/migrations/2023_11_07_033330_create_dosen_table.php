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

        
        // Di migrasi create_dosen_table
Schema::create('dosen', function (Blueprint $table) 
{
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
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen');
    }
};
