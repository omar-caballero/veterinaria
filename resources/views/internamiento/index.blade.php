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

<form action="" method="GET">
<div class="form-row">
    <div class="col-sm-4">
        <input type="text" name="buscar" class="form-control" placeholder="buscar">
    </div>
    <div class="col-sm-4">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</div>

<div class="d-flex">
    <a href="/exportar" class="btn btn-success">EXPORTAR A EXCEL</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Motivo</th>
            <th>Fecha de Ingreso</th>
            <th>Fecha de Salida</th>
            <th>Peso</th>
            <th>Temperatura</th>
            <th>Diagnostico</th>
            <th>Comentarios</th>
            <th>Pagar</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($internamientos as $internamiento)
        <tr>
            <td>{{$internamiento->Motivo}}</td>
            <td>{{$internamiento->FechaIngreso}}</td>
            <td>{{$internamiento->FechaSalida}}</td>
            <td>{{$internamiento->Peso}}</td>
            <td>{{$internamiento->Temperatura}}</td>
            <td>{{$internamiento->Diagnostico}}</td>
            <td>{{$internamiento->Comentarios}}</td>
            <td>{{$internamiento->Pagar}}</td>
            <td>
                <a href="{{ route('internamiento.edit',$internamiento->id)}}" class="btn btn-primary">Editar</a>
                <form action="{{ route('internamiento.destroy', $internamiento->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" type="submit">Eliminar</button>
                </form>
                <a href="{{ route('internamiento.show',$internamiento->id)}}" class="btn btn-info">Ver</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


</div>
@endsection