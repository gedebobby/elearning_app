<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = [], $table = 'tb_guru';

    public function ruang_kelas()
    {
        return $this->hasMany(RuangKelas::class);
    }

    public function tb_materi()
    {
        return $this->hasMany(Materi::class);
    }
    public function tb_tugas(){
        return $this->hasMany(Tugas::class);
    }

}
