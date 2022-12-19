<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinTalepler extends Model
{
    use HasFactory;
    public function izinInfo(){
        return  $this->hasOne(izintur::class, 'id', 'izin_tur');
    }
    public function userInfo(){
        return  $this->hasOne(User::class, 'id', 'user_id');
    }
}
