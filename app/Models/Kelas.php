<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [], $table = 'tb_kelas';

    // public function ruang_kelas()
    // {
    //    return $this->belongsTo(RuangKelas::class);
    // }


    public function siswa(){
        return $this->hasMany(Siswa::class);
    }
    
    public function tb_materi(){
        return $this->hasMany(Materi::class);
    }
    public function tb_tugas(){
        return $this->hasMany(Tugas::class);
    }

    public function tb_ujian(){
        return $this->hasMany(Ujian::class);
    }


}
