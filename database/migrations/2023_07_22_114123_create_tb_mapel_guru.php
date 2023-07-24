<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMapelGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mapel_guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guru')->constrained('tb_guru')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_mapel')->constrained('tb_mapel')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tb_mapel_guru');
    }
}
