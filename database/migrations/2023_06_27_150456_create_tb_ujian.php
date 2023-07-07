<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ujian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ujian');
            $table->foreignId('id_mapel')->constrained('tb_mapel');
            $table->foreignId('id_kelas')->constrained('tb_kelas');
            $table->date('tgl_mulai');
            $table->time('waktu_mulai');
            $table->time('endtime');
            $table->string('waktu');
            $table->boolean('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ujian');
    }
}
