<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalUjian extends Model
{
    use HasFactory;
    protected $guarded =[], $table='tb_soal';

    // public function mapel(){
    //     return $this->belongsTo(Mapel::class, 'id_mapel');  
    // }
}
