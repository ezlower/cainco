<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($estudiante->nombre) ? $estudiante->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('paterno') ? 'has-error' : ''}}">
    <label for="paterno" class="control-label">{{ 'Paterno' }}</label>
    <input class="form-control" name="paterno" type="text" id="paterno" value="{{ isset($estudiante->paterno) ? $estudiante->paterno : ''}}" >
    {!! $errors->first('paterno', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('materno') ? 'has-error' : ''}}">
    <label for="materno" class="control-label">{{ 'Materno' }}</label>
    <input class="form-control" name="materno" type="text" id="materno" value="{{ isset($estudiante->materno) ? $estudiante->materno : ''}}" >
    {!! $errors->first('materno', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
    <input class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($estudiante->direccion) ? $estudiante->direccion : ''}}" >
    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($estudiante->email) ? $estudiante->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
