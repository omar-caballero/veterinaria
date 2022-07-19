@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{ url('/mascota')}}" method="post" enctype="multipart/form-data">
@csrf
@include('mascota/form',['modo'=>'Crear'])

</form>

</div>
@endsection