@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/propietario')}}" method="post" enctype="multipart/form-data">
@csrf

@include('propietario/form',['modo'=>'Crear'])
</form>



</div>
@endsection