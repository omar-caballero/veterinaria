@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/internamiento/'.$internamiento->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('internamiento/form',['modo'=>'Editar'])
</form>

</div>
@endsection