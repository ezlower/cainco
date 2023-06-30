<div class="form-group {{ $errors->has('cedula') ? 'has-error' : ''}}">
    <label for="cedula" class="control-label">{{ 'Cedula' }}</label>
    <input class="form-control" name="cedula" type="number" id="cedula" value="{{ isset($matricula->cedula) ? $matricula->cedula : ''}}" >
    {!! $errors->first('cedula', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sexo') ? 'has-error' : ''}}">
    <label for="sexo" class="control-label">{{ 'Sexo' }}</label><br>
    {!!Form::select('sexo', array('Masculino' => 'masculino', 'Femenino' => 'femenino'), 'Masculino');!!}
    
    
</select>
    {!! $errors->first('sexo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estadocivil') ? 'has-error' : ''}}">
    <label for="estadocivil" class="control-label">{{ 'Estadocivil' }}</label><br>
    {!! Form::select('estadocivil', array('Casado' => 'casado', 'Soltero' => 'soltero'), 'Soltero'); !!}
</select>
    {!! $errors->first('estadocivil', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fechanacimiento') ? 'has-error' : ''}}">
    <label for="fechanacimiento" class="control-label">{{ 'Fechanacimiento' }}</label>
    <input class="form-control" name="fechanacimiento" type="date" id="fechanacimiento" value="{{ isset($matricula->fechanacimiento) ? $matricula->fechanacimiento : ''}}" >
    
    {!! $errors->first('fechanacimiento', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="control-label">{{ 'Telefono' }}</label>
    <input class="form-control" name="telefono" type="number" id="telefono" value="{{ isset($matricula->telefono) ? $matricula->telefono : ''}}" >
    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('estudiante_id') ? 'has-error' : ''}}">
    <label for="estudiante_id" class="control-label">{{ 'Estudiante Id' }}</label>
    <input class="form-control" name="estudiante_id" type="number" id="estudiante_id" value="{{ isset($matricula->estudiante_id) ? $matricula->estudiante_id : ''}}" >
    {!! $errors->first('estudiante_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Create' }}">
</div>
