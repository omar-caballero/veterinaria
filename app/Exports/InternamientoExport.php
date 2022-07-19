<?php

namespace App\Exports;

use App\Models\Internamiento;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

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
        ->select('mascotas.Nombre','mascotas.Sexo','mascotas.FechaNacimiento','razas.Nombre as raza','mascotas.Tamaño','mascotas.Foto','mascotas.Alergia','propietarios.Nombre as propietario','propietarios.ApellidoPaterno','propietarios.ApellidoMaterno','propietarios.TipodeDocumento','propietarios.NumdeDocumento','propietarios.Telefono','propietarios.Correo','propietarios.Direccion','propietarios.Referencia','internamientos.Motivo','internamientos.Fechaingreso','internamientos.FechaSalida','internamientos.Peso','internamientos.Temperatura','internamientos.Diagnostico','internamientos.Comentarios','internamientos.Pagar')
        ->get();

        return $internamientos;
    }
    public function headings(): array
    {
        return [
            'id',
            'Motivo',
            'FechaIngreso',
            'FechaSalida',
            'Peso', 
            'Temperatura',
            'Diagnostico',
            'Comentarios',
            'Pagar',
            'id_mascota',
        ];
    }
}
