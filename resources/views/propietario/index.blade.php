@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible">
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('mensaje') }}
    </div>
@endif

<div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Registrar
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a href="{{ route('propietario.create') }}"class="dropdown-item">Registrar Propietario</a>
    <a href="{{ route('mascota.create') }}"class="dropdown-item">Registrar Mascota</a>
    <a href="{{ route('raza.create') }}"class="dropdown-item">Registrar Raza</a>
    <a href="{{ route('internamiento.create') }}"class="dropdown-item">Registrar Internamiento</a>
  </div>
</div>


<table class="table">
    <thead>
        <tr>
            <th>Tipo de Documento</th>
            <th>Numero de Documento</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Referencia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($propietarios as $propietario)
        <tr>
            <td>{{$propietario->TipodeDocumento}}</td>
            <td>{{$propietario->NumdeDocumento}}</td>
            <td>{{$propietario->Nombre}}</td>
            <td>{{$propietario->ApellidoPaterno}}</td>
            <td>{{$propietario->ApellidoMaterno}}</td>
            <td>{{$propietario->Telefono}}</td>
            <td>{{$propietario->Correo}}</td>
            <td>{{$propietario->Direccion}}</td>
            <td>{{$propietario->Referencia}}</td>
            <td>
                <a href="{{route('propietario.edit',$propietario->id)}}" class="btn btn-warning">Editar</a>

                <form action="{{ route('propietario.destroy', $propietario->id)}}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Quieres Borrar? Se eliminaran todas las mascotas con este propietario')" type="submit">Eliminar</button>
                </form>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>

</div>
@endsection