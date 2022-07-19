<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function mascotas(){
        return $this->hasMany(Mascota::class,'id');
    }
    
}
