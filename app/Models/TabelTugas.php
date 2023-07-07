<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelTugas extends Model
{
    use HasFactory;
    protected $guarded = [], $table = "tb_tugas_siswa";

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
