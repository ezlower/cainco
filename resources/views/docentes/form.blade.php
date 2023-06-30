<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($docente->nombre) ? $docente->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('paterno') ? 'has-error' : ''}}">
    <label for="paterno" class="control-label">{{ 'Paterno' }}</label>
    <input class="form-control" name="paterno" type="text" id="paterno" value="{{ isset($docente->paterno) ? $docente->paterno : ''}}" >
    {!! $errors->first('paterno', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('materno') ? 'has-error' : ''}}">
    <label for="materno" class="control-label">{{ 'Materno' }}</label>
    <input class="form-control" name="materno" type="text" id="materno" value="{{ isset($docente->materno) ? $docente->materno : ''}}" >
    {!! $errors->first('materno', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cedula') ? 'has-error' : ''}}">
    <label for="cedula" class="control-label">{{ 'Cedula' }}</label>
    <input class="form-control" name="cedula" type="number" id="cedula" value="{{ isset($docente->cedula) ? $docente->cedula : ''}}" >
    {!! $errors->first('cedula', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('curso_id') ? 'has-error' : ''}}">
    <label for="curso_id" class="control-label">{{ 'Curso Id' }}</label>
    <input class="form-control" name="curso_id" type="number" id="curso_id" value="{{ isset($docente->curso_id) ? $docente->curso_id : ''}}" >
    {!! $errors->first('curso_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
