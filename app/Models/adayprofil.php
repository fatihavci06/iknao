<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adayprofil extends Model
{
    use HasFactory;
    public function bransInfo(){
        return  $this->hasOne(Brans::class, 'id', 'brans_id');
    }
}
