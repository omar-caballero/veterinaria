<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internamiento extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function mascotas(){
        return $this->belongsTo(Mascota::class ,'id_mascota');
    }
}
