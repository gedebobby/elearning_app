<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $guarded = [], $table = 'tb_mapel';

    public function tb_materi(){
        return $this->hasMany(Materi::class);
    }

    public function tb_soal_ujian(){
        return $this->hasMany(SoalUjian::class);
    }

    public function tb_ujian(){
        return $this->hasMany(Ujian::class);
    }

    public function tb_mapel_guru(){
        return $this->belongsToMany(Guru::class, 'tb_mapel_guru', 'id_mapel', 'id_guru');
    }
}
