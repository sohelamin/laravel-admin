@extends('layouts.app')

@section('content')

    <h1>Give Permission to Role</h1>
    <hr/>

    {!! Form::open(['method' => 'POST', 'url' => ['/admin/give-role-permissions'], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Role: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <select class="roles form-control" id="role" name="role">
                @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->label }}</option>
                @endforeach()
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('label', 'Permissions: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <select class="permissions form-control" id="permissions" name="permissions[]" multiple="multiple">
                @foreach($permissions as $permission)
                <option value="{{ $permission->name }}">{{ $permission->label }}</option>
                @endforeach()
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Grant', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection