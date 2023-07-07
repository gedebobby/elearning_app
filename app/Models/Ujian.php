<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $guarded = [], $table = 'tb_ujian';

    public function setEndtimeAttribute($value)
    {
       $this->attributes['endtime'] = Carbon::parse($this->attributes['waktu_mulai'])->addMinutes($value);
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'id_mapel');  
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');  
    }
}
