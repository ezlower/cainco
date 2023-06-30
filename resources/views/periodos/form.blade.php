<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($periodo->nombre) ? $periodo->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('duracion') ? 'has-error' : ''}}">
    <label for="duracion" class="control-label">{{ 'Duracion' }}</label>
    <input class="form-control" name="duracion" type="number" id="duracion" value="{{ isset($periodo->duracion) ? $periodo->duracion : ''}}" >
    {!! $errors->first('duracion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('a単o') ? 'has-error' : ''}}">
    <label for="a単o" class="control-label">{{ 'A祓o' }}</label>
    <input class="form-control" name="a単o" type="number" id="a単o" value="{{ isset($periodo->a単o) ? $periodo->a単o : ''}}" >
    {!! $errors->first('a単o', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($periodo->descripcion) ? $periodo->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
