
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
    <label for="TipodeDocumento">Tipo de Documento</label>
    <select class="form-control" id="TipodeDocumento" name="TipodeDocumento">
        <option value="DNI">DNI</option>
        <option value="CARNE DE EXTRANJERIA">CARNÉ DE EXTRANJERIA</option>
    </select>
</div>
<br>

<div class="form-group">
    <label for="NumdeDocumento">Numero de Documento</label>
    <input type="text" class="form-control" id="NumdeDocumento" value="{{isset($propietario->NumdeDocumento)?$propietario->NumdeDocumento:old('NumdeDocumento') }}" name="NumdeDocumento" placeholder="Numero de Documento">
</div>
<br>

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" value="{{isset($propietario->Nombre)?$propietario->Nombre:old('Nombre') }}" name="nombre" placeholder="Nombre">
</div>
<br>

<div class="form-group">
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" class="form-control" id="ApellidoPaterno" value="{{isset($propietario->ApellidoPaterno)?$propietario->ApellidoPaterno:old('ApellidoPaterno') }}" name="ApellidoPaterno" placeholder="Apellido Paterno">
</div>
<br>

<div class="form-group">
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" class="form-control" id="ApellidoMaterno" value="{{isset($propietario->ApellidoMaterno)?$propietario->ApellidoMaterno:old('ApellidoMaterno') }}" name="ApellidoMaterno" placeholder="Apellido Materno">
</div>
<br>

<div class="form-group">
    <label for="Telefono">Teléfono</label>
    <input type="text" class="form-control" id="Telefono" value="{{isset($propietario->Telefono)?$propietario->Telefono:old('Telefono') }}" name="Telefono" placeholder="Teléfono">
</div>
<br>

<div class="form-group">
    <label for="Correo">Correo</label>
    <input type="text" class="form-control" id="Correo" value="{{isset($propietario->Correo)?$propietario->Correo:old('Correo') }}" name="Correo" placeholder="Correo">
</div>
<br>

<div class="form-group">
    <label for="Direccion">Dirección</label>
    <input type="text" class="form-control" id="Direccion" value="{{isset($propietario->Direccion)?$propietario->Direccion:old('Direccion') }}" name="Direccion" placeholder="Dirección">  
</div>
<br>

<div class="form-group">
    <label for="Referencia">Referencia</label>
    <input type="text" class="form-control" id="Referencia" value="{{isset($propietario->Referencia)?$propietario->Referencia:old('Referencia') }}" name="Referencia" placeholder="Referencia">
</div>
<br>

<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{$modo}}">
</div>
<br>
<a href="{{ route('propietario.index')}}" class="btn btn-primary">Mostrar Propietarios</a>