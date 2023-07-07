<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [], $table = 'tb_siswa';

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function tb_tugas(){
        return $this->hasOne(TabelTugas::class, 'id_siswa');
    }

    public function ruang_kelas()
    {
        return $this->hasMany(RuangKelas::class);
    }

}
