@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/raza/'.$raza->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('raza/form',['modo'=>'Editar'])

</form>

</div>
@endsection