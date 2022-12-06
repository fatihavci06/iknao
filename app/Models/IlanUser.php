<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IlanUser extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ilanInfo(){
        return  $this->hasOne(Ilan::class, 'id', 'ilan_id');
    }
    public function userInfo(){
        return  $this->hasOne(User::class, 'id', 'user_id');
    }


}
