<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['razas']=Raza::paginate();
        return view('raza.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('raza.create');
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
        $campos=[
            'nombre'=>'required|string|max:100',
        ];
        $mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$mensaje);

        $datosRaza = request()->except('_token');
        Raza::insert($datosRaza);
        return redirect('raza')->with('mensaje','Raza agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function show(Raza $raza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $raza=Raza::findOrFail($id);

        return view('raza.edit',compact('raza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre'=>'required|string|max:100',
        ];
        $mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$mensaje); 

        $datosRaza = request()->except('_token','_method');
        Raza::where('id','=',$id)->update($datosRaza);

        $raza=Raza::findOrFail($id);
        return redirect('raza')->with('mensaje','Raza actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Raza::destroy($id);
        return redirect('raza')->with('mensaje','Raza eliminada correctamente');
    }
}
