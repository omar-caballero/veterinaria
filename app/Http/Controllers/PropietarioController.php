<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['propietarios']=Propietario::paginate();
        return view('propietario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('propietario.create');
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
            'TipodeDocumento'=>'required|string|max:255',
            'NumdeDocumento'=>'required|string|max:255',
            'nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Telefono'=>'required|string|max:255',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:255',
            'Referencia'=>'required|string|max:255',
        ];
        $mensaje=["required"=>'El :attribute es requerido',
                "NumdeDocumento.required"=>'El numero de documento es requerido',
                "Direccion.required"=>'La :attribute es requerida',
                "Referencia.required"=>'La :attribute es requerida',
            ];
        $this->validate($request,$datos,$mensaje);

        $datosPropietario=$request->except('_token');
        Propietario::insert($datosPropietario);
        return redirect('propietario')->with('mensaje','Propietario agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $propietario=Propietario::findOrFail($id);

        return view('propietario.edit',compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos=[
            'TipodeDocumento'=>'required|string|max:255',
            'NumdeDocumento'=>'required|string|max:255',
            'nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Telefono'=>'required|string|max:255',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:255',
            'Referencia'=>'required|string|max:255',
        ];
        $mensaje=["required"=>'El :attribute es requerido',
            "NumdeDocumento.required"=>'El numero de documento es requerido',
            "Direccion.required"=>'La :attribute es requerida',
            "Referencia.required"=>'La :attribute es requerida',
        ];
        $this->validate($request,$datos,$mensaje);

        $datosPropietario=$request->except('_token','_method');
        Propietario::where('id','=',$id)->update($datosPropietario);

        return redirect('propietario')->with('mensaje','Propietario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Propietario::destroy($id);
        return redirect('propietario')->with('mensaje','Propietario eliminado correctamente');
    }
}
