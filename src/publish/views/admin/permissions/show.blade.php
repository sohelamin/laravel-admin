@extends('layouts.master')

@section('content')

    <h1>Permission</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Label</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $permission->id }}</td> <td> {{ $permission->name }} </td><td> {{ $permission->label }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection