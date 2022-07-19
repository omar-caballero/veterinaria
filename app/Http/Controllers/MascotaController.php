<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Propietario;
use App\Models\Raza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mascotas = Mascota::all();
        return view('mascota.index',compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mascota=Mascota::all();
        $razas = Raza::all();
        $propietarios = Propietario::all();
        
        return view('mascota.create',compact('mascota','razas','propietarios'));

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
            'nombre'=>'required',
            'fechaNacimiento'=>'required',
            'tamaño'=>'required',
            'Alergia'=>'required',
            'foto'=>'required',
        ];
        $mensaje=[
            "required"=>'El :attribute es requerido',
            "fechaNacimiento.required"=>'La Fecha de Nacimiento es requerida',
            "foto.required"=>'La :attribute es requerida chupala jean',
            "Alergia.required"=>'La :attribute es requerida',
            "mimes"=>'El :attribute debe ser una imagen',
        ];
        $this->validate($request,$datos,$mensaje);
        $datosMascota=request()->except('_token');
        //dd($datosMascota);

        if($request->hasFile('foto')){
            $datosMascota['foto']=$request->file('foto')->store('uploads','public');
        }

        Mascota::insert($datosMascota);

        return redirect('mascota')->with('mensaje','Mascota agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mascota=Mascota::findOrFail($id);
        $razas = Raza::all();
        $propietarios = Propietario::all();
        return view('mascota.edit', compact('mascota', 'razas', 'propietarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos=[
            'nombre'=>'required',
            'fechaNacimiento'=>'required',
            'tamaño'=>'required',
            'Alergia'=>'required',
        ];
        $mensaje=[
            "required"=>'El :attribute es requerido',
            "fechaNacimiento.required"=>'La Fecha de Nacimiento es requerida',
            "Alergia.required"=>'La :attribute es requerida',   
            
        ];
        

        if($request->hasFile('foto')){
            $datos=['foto'=>'required'];
            $mensaje=['foto.required'=>'La :attribute es requerida'];
        }

        $this->validate($request,$datos,$mensaje);

        $datosMascota=request()->except('_token','_method');
        

        if($request->hasFile('Foto')){
            $mascota=Mascota::findOrFail($id);
            Storage::delete('public/'.$mascota->Foto);

            $datosMascota['Foto']=$request->file('Foto')->store('uploads','public');
        }
        

        Mascota::where('id','=',$id)->update($datosMascota);

        return redirect('mascota')->with('mensaje','Mascota actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mascota=Mascota::findOrFail($id);

        if(Storage::delete('public/'.$mascota->Foto)){
            Mascota::destroy($mascota->id);
            return redirect('mascota')->with('mensaje','Mascota eliminada correctamente');
        }

    }
}
