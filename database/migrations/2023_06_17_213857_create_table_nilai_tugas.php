<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNilaiTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tugas_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tugas')->constrained('tb_tugas')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('id_siswa')->constrained('tb_siswa')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('id_guru')->constrained('tb_guru')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->integer('nilai')->default(0);
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
        Schema::dropIfExists('tb_tugas_siswa');
    }
}
