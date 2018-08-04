<div class="form-group{{ $errors->has('key') ? 'has-error' : ''}}">
    {!! Form::label('key', 'Key', ['class' => 'control-label']) !!}
    {!! Form::text('key', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
    {!! Form::text('value', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
