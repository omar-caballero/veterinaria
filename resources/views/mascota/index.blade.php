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
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Tamaño</th>
            <th>Foto</th>
            <th>Alergias</th>
            <th>Raza</th>
            <th>Propietario</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mascotas as $mascota)
        <tr>
            <td>{{$mascota->Nombre}}</td>
            <td>{{$mascota->Sexo}}</td>
            <td>{{$mascota->FechaNacimiento}}</td>

            @if(date_diff(date_create($mascota->FechaNacimiento), date_create('today'))->y < 1)
                <td>{{ date_diff(date_create($mascota->FechaNacimiento), date_create('today'))->m }} meses</td>
            @else
                <td>{{ date_diff(date_create($mascota->FechaNacimiento), date_create('today'))->y }} años</td>
            @endif

            <td>{{$mascota->Tamaño}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$mascota->Foto}}" width="100">
            </td>
            <td>{{$mascota->Alergia}}</td>
            <td>{{$mascota->razas->Nombre}}</td>
            <td>{{$mascota->propietarios->Nombre}}</td>
            
            <td>
                <a href="{{route('mascota.edit',$mascota->id)}}" class="btn btn-warning">Editar</a>
                <form action="{{ route('mascota.destroy', $mascota->id)}}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Quieres Borrar? Se eliminaran todos los registros con este tipo de mascota')" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



</div>
@endsection