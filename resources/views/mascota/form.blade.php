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
    <input type="text" class="form-control" value="{{isset($mascota->Nombre)?$mascota->Nombre:old('Nombre') }}" id="nombre" name="nombre" placeholder="Nombre">
</div>
<br>

<div class="form-group">
    <label for="sexo">sexo</label>
    <select class="form-control" value="{{isset($mascota->Sexo)?$mascota->Sexo:old('Sexo') }}" id="sexo" name="sexo">
        <option value="Macho">Macho</option>
        <option value="Hembra">Hembra</option>
    </select>
</div>
<br>

<div class="form-group">
    <label for="fechaNacimiento">Fecha de Nacimiento</label>
    <input type="date" class="form-control" value="{{isset($mascota->FechaNacimiento)?$mascota->FechaNacimiento:old('FechaNacimiento') }}" id="fechaNacimiento" name="fechaNacimiento" placeholder="FechaNacimiento">
</div>
<br>


<div class="form-group">
<label for="id_raza">Raza</label>
    <select class="form-control" id="id_raza" name="id_raza">
       @foreach ($razas as $raza)
    @if (!empty($mascota->id_raza) && $mascota->id_raza == $raza->id)
        <option value="{{$raza->id}}" selected>{{ $raza->Nombre}}</option>
    @else
        <option value="{{$raza->id}}">{{ $raza->Nombre}}</option>
    @endif
@endforeach
    </select>
</div>
<br>

<div class="form-group">
    <label for="id_propietario">Propietario</label>
    <select class="form-control" id="id_propietario" name="id_propietario" placeholder="propietario">
    @foreach ($propietarios as $propietario)
    @if (!empty($mascota->id_propietario) && $mascota->id_propietario == $propietario->id)
        <option value="{{$propietario->id}}" selected>{{ $propietario->Nombre}}</option>
    @else
        <option value="{{ $propietario->id}}">{{ $propietario->Nombre}}</option>
    @endif
    @endforeach
    </select>
</div>
<br>

<div class="form-group">
    <label for="tamaño">Tamaño</label>
    <input type="text" class="form-control" value="{{isset($mascota->Tamaño)?$mascota->Tamaño:old('Tamaño') }}" id="tamaño" name="tamaño" placeholder="Tamaño">
</div>
<br>

<div class="form-group">
    <label for="foto">Foto</label>
    @if(isset($mascota->Foto))
        <img src="{{ asset('storage').'/'.$mascota->Foto}}" class="img-thumbnail" width="100">
    @endif
    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
</div>
<br>

<div class="form-group">
    <label for="Alergia">Alergia</label>
    <input type="text" value="{{isset($mascota->Alergia)?$mascota->Alergia:old('Alergia') }}" class="form-control" id="Alergia" name="Alergia" placeholder="Alergia"></textarea>
</div>
<br>

<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{$modo}}">
</div>
<br>

    <a href="{{ route('mascota.index')}}" class="btn btn-primary">Mostrar mascotas</a>
</div>
