
<h1> {{$modo}} Raza</h1>

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" value="{{isset($raza->Nombre)?$raza->Nombre:old('Nombre') }}" name="nombre" placeholder="Nombre">
</div>
<br>
<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{$modo}}">
</div>
<br>
<a href="{{ route('raza.index')}}" class="btn btn-primary">Mostrar Razas</a>
