<?php

namespace App\Http\Controllers;

use App\Models\Internamiento;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Exports\InternamientoExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;


class InternamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar=trim($request->get('buscar'));
        //inner join
        //query builder for the table internamiento and the table mascota
        $internamientos=DB::table('internamientos')
        ->join('mascotas', 'internamientos.id_mascota', '=', 'mascotas.id')
        ->select('internamientos.*', 'mascotas.Nombre')
        ->where('mascotas.Nombre','like','%'.$buscar.'%')
        ->orWhere('Motivo','like','%'.$buscar.'%')
        //for Peso
        ->orWhere('Peso','like','%'.$buscar.'%')
        
        ->orWhere('fechaIngreso','like','%'.$buscar.'%')
      
        ->orWhere('fechaSalida','like','%'.$buscar.'%')
      
        ->orWhere('Temperatura','like','%'.$buscar.'%')
       
        ->orWhere('Diagnostico','like','%'.$buscar.'%')
   
        ->orWhere('Comentarios','like','%'.$buscar.'%')
       
        ->orWhere('Pagar','like','%'.$buscar.'%')

        ->paginate(10);
        return view('internamiento.index',compact('internamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $internamiento=Internamiento::all();
        $mascotas=Mascota::all();
        return view('internamiento.create',compact('internamiento','mascotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos=[
            'Motivo'=>'required',
            'FechaIngreso'=>'required',
            'FechaSalida'=>'required',
            'Peso'=>'required',
            'Temperatura'=>'required',
            'Diagnostico'=>'required',
            'Comentarios'=>'required',
            'Pagar'=>'required',
        ];
        $mensaje=[
            "required"=>'El :attribute es requerido',
        ];
        $this->validate($request,$datos,$mensaje);
        $datosInternamiento=request()->except('_token');
        Internamiento::insert($datosInternamiento);
        return redirect('internamiento')->with('mensaje','Internamiento agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Internamiento  $internamiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $datos=Internamiento::where('id','=',$id)->first();   

        return view('internamiento.show',compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Internamiento  $internamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $internamiento=Internamiento::findOrFail($id);
        $mascotas=Mascota::all();
        return view('internamiento.edit',compact('internamiento','mascotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Internamiento  $internamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos=[
            'Motivo'=>'required',
            'FechaIngreso'=>'required',
            'FechaSalida'=>'required',
            'Peso'=>'required',
            'Temperatura'=>'required',
            'Diagnostico'=>'required',
            'Comentarios'=>'required',
            'Pagar'=>'required',
        ];
        $mensaje=[
            "required"=>'El :attribute es requerido',
        ];
        $this->validate($request,$datos,$mensaje);
        $datosInternamiento=request()->except('_token','_method');
        Internamiento::where('id','=',$id)->update($datosInternamiento);
        return redirect('internamiento')->with('mensaje','Internamiento actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Internamiento  $internamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Internamiento::destroy($id);
        return redirect('internamiento')->with('mensaje','Internamiento eliminado con éxito');
    }

    public function exportar(){
        return Excel::download(new InternamientoExport, 'internamiento.xlsx');
    }

}