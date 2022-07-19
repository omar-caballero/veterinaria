
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
            <th>Raza</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
        @foreach ($razas as $raza)
            <td>{{ $raza->Nombre}}</td>
            <td>
                <a href="{{ route('raza.edit', $raza->id)}}" class="btn btn-warning">Editar</a>
                <form action="{{ route('raza.destroy', $raza->id)}}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Quieres Borrar? se eliminaran todas las mascotas con este tipo de raza')" type="submit">Eliminar</button>
                </form>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection