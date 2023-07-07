<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_materi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_materi');
            $table->foreignId('id_kelas')->constrained('tb_kelas');
            $table->foreignId('id_mapel')->constrained('tb_mapel');
            $table->foreignId('id_guru')->constrained('tb_guru');
            $table->string('file_name')->nullable();
            $table->string('link_materi')->nullable();
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
        Schema::dropIfExists('tb_materi');
    }
}
