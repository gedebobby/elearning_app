<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tugas');
            $table->foreignId('id_kelas')->constrained('tb_kelas');
            $table->foreignId('id_mapel')->constrained('tb_mapel');
            $table->foreignId('id_guru')->constrained('tb_guru');
            $table->string('keterangan');
            $table->string('file_tugas');
            $table->date('batas_tgl');
            $table->time('batas_waktu');
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('tb_tugas');
    }
}
