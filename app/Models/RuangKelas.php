<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;

    protected $guarded = [], $table = 'ruang_kelas';

    public function kelas()
    {
       return $this->belongsTo(Kelas::class, 'id_kelas');

    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function guru()
    {
        return $this->belongsTo(guru::class, 'id_guru');
    }
}
