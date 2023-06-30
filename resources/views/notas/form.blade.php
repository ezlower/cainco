<div class="form-group {{ $errors->has('estudiante_id') ? 'has-error' : ''}}">
    <label for="estudiante_id" class="control-label">{{ 'Estudiante Id' }}</label>
    <input class="form-control" name="estudiante_id" type="number" id="estudiante_id" value="{{ isset($nota->estudiante_id) ? $nota->estudiante_id : ''}}" >
    {!! $errors->first('estudiante_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('curso_id') ? 'has-error' : ''}}">
    <label for="curso_id" class="control-label">{{ 'Curso Id' }}</label>
    <input class="form-control" name="curso_id" type="number" id="curso_id" value="{{ isset($nota->curso_id) ? $nota->curso_id : ''}}" >
    {!! $errors->first('curso_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nota1') ? 'has-error' : ''}}">
    <label for="nota1" class="control-label">{{ 'Nota1' }}</label>
    <input class="form-control" name="nota1" type="number" id="nota1" value="{{ isset($nota->nota1) ? $nota->nota1 : ''}}" >
    {!! $errors->first('nota1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nota2') ? 'has-error' : ''}}">
    <label for="nota2" class="control-label">{{ 'Nota2' }}</label>
    <input class="form-control" name="nota2" type="number" id="nota2" value="{{ isset($nota->nota2) ? $nota->nota2 : ''}}" >
    {!! $errors->first('nota2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nota3') ? 'has-error' : ''}}">
    <label for="nota3" class="control-label">{{ 'Nota3' }}</label>
    <input class="form-control" name="nota3" type="number" id="nota3" value="{{ isset($nota->nota3) ? $nota->nota3 : ''}}" >
    {!! $errors->first('nota3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('notafinal') ? 'has-error' : ''}}">
    <label for="notafinal" class="control-label">{{ 'Notafinal' }}</label>
    <input class="form-control" name="notafinal" type="number" id="notafinal" value="{{ isset($nota->notafinal) ? $nota->notafinal : ''}}" >
    {!! $errors->first('notafinal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($nota->descripcion) ? $nota->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
