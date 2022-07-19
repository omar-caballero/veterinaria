<?php

namespace App\Exports;

use App\Models\Internamiento;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class InternamientoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $internamientos=DB::table('internamientos')
        ->join('mascotas', 'internamientos.id_mascota', '=', 'mascotas.id')
        ->join('razas', 'mascotas.id_raza', '=', 'razas.id')
        ->join('propietarios', 'mascotas.id_propietario', '=', 'propietarios.id')
        ->select('mascotas.Nombre','mascotas.Sexo','internamientos.*','razas.Nombre as raza','propietarios.Nombre as propietario','propietarios.ApellidoPaterno as apellidopaterno')
        ->get();
        return $internamientos;
    }
}
