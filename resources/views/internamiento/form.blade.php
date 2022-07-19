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
    <label for="Motivo">Motivo</label>
    <input type="text" class="form-control" value="{{isset($internamiento->Motivo)?$internamiento->Motivo:old('Motivo') }}" id="Motivo" name="Motivo" placeholder="Motivo">
</div>
<br>
<div class="form-group">
    <label for="FechaIngreso">Fecha de Ingreso</label>
    <input type="date" class="form-control" value="{{isset($internamiento->FechaIngreso)?$internamiento->FechaIngreso:old('Fecha') }}" id="FechaIngreso" name="FechaIngreso" placeholder="FechaIngreso">
</div>
<br>
<div class="form-group">
    <label for="FechaSalida">Fecha de Salida</label>
    <input type="date" class="form-control" value="{{isset($internamiento->FechaSalida)?$internamiento->FechaSalida:old('Fecha') }}" id="FechaSalida" name="FechaSalida" placeholder="FechaSalida">
</div>
<br>
<div class="form-group">
    <label for="id_mascota">Mascota</label>
    <select class="form-control" id="id_mascota" name="id_mascota">
        @foreach ($mascotas as $mascota)
        @if (!empty($internamiento->id_mascota) && $internamiento->id_mascota == $mascota->id)
            <option value="{{$mascota->id}}" selected>{{ $mascota->Nombre}}</option>
        @else
            <option value="{{$mascota->id}}">{{ $mascota->Nombre}}</option>
        @endif
        @endforeach
    </select>
</div>
<br>
<div class="form-group">
    <label for="Peso">Peso</label>
    <input type="text" class="form-control" value="{{isset($internamiento->Peso)?$internamiento->Peso:old('Peso') }}" id="Peso" name="Peso" placeholder="Peso">
</div>
<br>
<div class="form-group">
    <label for="Temperatura">Temperatura</label>
    <input type="text" class="form-control" value="{{isset($internamiento->Temperatura)?$internamiento->Temperatura:old('Temperatura') }}" id="Temperatura" name="Temperatura" placeholder="Temperatura">
</div>
<br>
<div class="form-group">
    <label for="Diagnostico">Diagnostico</label>
    <input type="text" class="form-control" value="{{isset($internamiento->Diagnostico)?$internamiento->Diagnostico:old('Diagnostico') }}" id="Diagnostico" name="Diagnostico" placeholder="Diagnostico">
</div>
<br>
<div class="form-group">
    <label for="Comentarios">Comentarios</label>
    <input type="text" class="form-control" value="{{isset($internamiento->Comentarios)?$internamiento->Comentarios:old('Comentarios') }}" id="Comentarios" name="Comentarios" placeholder="Comentarios">
</div>
<br>
<div class="form-group">
    <label for="Pagar">Pagar</label>
    <input type="text" class="form-control" value="{{isset($internamiento->Pagar)?$internamiento->Pagar:old('Pagar') }}" id="Pagar" name="Pagar" placeholder="Pagar">
</div>
<br>
<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{$modo}}">
</div>
<br>

    <a href="{{ route('internamiento.index')}}" class="btn btn-primary">Mostrar Registros</a>
</div>
