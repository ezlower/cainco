<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($rango->nombre) ? $rango->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('duracion') ? 'has-error' : ''}}">
    <label for="duracion" class="control-label">{{ 'Duracion' }}</label>
    <input class="form-control" name="duracion" type="number" id="duracion" value="{{ isset($rango->duracion) ? $rango->duracion : ''}}" >
    {!! $errors->first('duracion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
    <label for="fecha_inicio" class="control-label">{{ 'Fecha Inicio' }}</label>
    <input class="form-control" name="fecha_inicio" type="date" id="fecha_inicio" value="{{ isset($rango->fecha_inicio) ? $rango->fecha_inicio : ''}}" >
    {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha_final') ? 'has-error' : ''}}">
    <label for="fecha_final" class="control-label">{{ 'Fecha Final' }}</label>
    <input class="form-control" name="fecha_final" type="date" id="fecha_final" value="{{ isset($rango->fecha_final) ? $rango->fecha_final : ''}}" >
    {!! $errors->first('fecha_final', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('periodo_id') ? 'has-error' : ''}}">
    <label for="periodo_id" class="control-label">{{ 'Periodo Id' }}</label>
    <input class="form-control" name="periodo_id" type="number" id="periodo_id" value="{{ isset($rango->periodo_id) ? $rango->periodo_id : ''}}" >
    {!! $errors->first('periodo_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
