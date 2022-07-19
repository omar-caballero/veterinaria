<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function propietarios(){
        return $this->belongsTo(Propietario::class ,'id_propietario');
    }
    public function internamientos(){
        return $this->hasMany(Internamiento::class,'id');
    }
    public function razas(){
        return $this->belongsTo(Raza::class,'id_raza');
    }
}
