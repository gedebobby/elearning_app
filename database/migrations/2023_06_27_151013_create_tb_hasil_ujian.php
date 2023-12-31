<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHasilUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hasil_ujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('tb_siswa')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('id_soal')->constrained('tb_soal')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('id_ujian')->constrained('tb_ujian')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('jawaban')->default(null);
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
        Schema::dropIfExists('tb_hasil_ujian');
    }
}
