<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $guarded = [], $table = 'tb_tugas';

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
