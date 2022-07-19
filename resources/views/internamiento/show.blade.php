@extends('layouts.app')

@section('content')
<div class="container">

<h1>DATOS DEL REGISTRO</h1>

<h3>DATOS DE LA MASCOTA</h3>
<div class="d-flex justify-content-around">
    <div class="d-flex flex-column">
        <div class="p-2"><label>Nombre:</label> {{$datos->mascotas->Nombre}}</div>
        <div class="p-2"><label>Sexo:</label> {{$datos->mascotas->Sexo}}</div>
        <div class="p-2"><label>Fecha de nacimiento:</label> {{$datos->mascotas->FechaNacimiento}}</div>
        @if(date_diff(date_create($datos->mascotas->FechaNacimiento), date_create('today'))->y < 1)
                    
                        <div class="p-2"> <label>Edad:</label>{{ date_diff(date_create($datos->mascotas->FechaNacimiento), date_create('today'))->m }} meses</div>
                    @else
                    
                        <div class="p-2"><label>Edad:</label>{{ date_diff(date_create($datos->mascotas->FechaNacimiento), date_create('today'))->y }} años</div>
                    @endif
    </div>
    <div class="d-flex flex-column">
        <div class="p-2"><label>Raza:</label> {{$datos->mascotas->razas->Nombre}}</div>
        <div class="p-2"><label>Tamaño:</label> {{$datos->mascotas->Tamaño}}</div>
        <div class="p-2"><label>Foto:</label><img src="{{asset('storage/'.$datos->mascotas->Foto)}}" alt="{{$datos->mascotas->Nombre}}" class="img-thumbnail" width="100px"></div>
        <div class="p-2"><label>Alergia:</label>{{$datos->mascotas->Alergia}}</div>
    </div>
</div>
<br>
<h3>DATOS DEL PROPIETARIO</h3>
<div class="d-flex justify-content-around">
    <div class="d-flex flex-column">
        <div class="p-2"><label>Nombre:</label> {{$datos->mascotas->propietarios->Nombre}}</div>
        <div class="p-2"><label>Apellido Paterno:</label> {{$datos->mascotas->propietarios->ApellidoPaterno}}</div>
        <div class="p-2"><label>Apellido Materno:</label> {{$datos->mascotas->propietarios->ApellidoMaterno}}</div>
        <div class="p-2"><label>Dirección:</label> {{$datos->mascotas->propietarios->Direccion}}</div>
    </div>
    <div class="d-flex flex-column">
        <div class="p-2"><label>Teléfono:</label> {{$datos->mascotas->propietarios->Telefono}}</div>
        <div class="p-2"><label>Correo:</label> {{$datos->mascotas->propietarios->Correo}}</div>
        <div class="p-2"><label>Referencia:</label> {{$datos->mascotas->propietarios->Referencia}}</div>
    </div>
</div>
<br>
<h3>DATOS DEL INTERNAMIENTO</h3>
<div class="d-flex justify-content-around">
    <div class="d-flex flex-column">
        <div class="p-2"><label>Motivo:</label> {{$datos->Motivo}}</div>
        <div class="p-2"><label>Fecha de ingreso:</label> {{$datos->FechaIngreso}}</div>
        <div class="p-2"><label>Fecha de salida:</label> {{$datos->FechaSalida}}</div>
        <div class="p-2"><label>Peso:</label> {{$datos->Peso}}</div>
    </div>
    <div class="d-flex flex-column">
        <div class="p-2"><label>Temperatura:</label> {{$datos->Temperatura}}</div>
        <div class="p-2"><label>Diagnostico:</label> {{$datos->Diagnostico}}</div>
        <div class="p-2"><label>Comentarios:</label> {{$datos->Comentarios}}</div>
        <div class="p-2"><label>Pagar:</label> {{$datos->Pagar}}</div>
    </div>
</div>

    <a href="{{route('internamiento.index')}}" class="btn btn-primary">Mostrar Registros</a>

</div>
@endsection
