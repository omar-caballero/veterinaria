@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/internamiento')}}" method="post" enctype="multipart/form-data">
@csrf
@include('internamiento/form',['modo'=>'Crear'])
</form>

</div>
@endsection