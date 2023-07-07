<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $guarded = [], $table = 'tb_user';

    // public function setUsernameAttribute($value){
    //     $this->attributes['username'] = strtolower(str_replace(' ', '', $value));
    // }
}
