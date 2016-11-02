@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/users/create') }}" class="btn btn-primary pull-right btn-sm">Add New User</a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}">
                                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                            </a> /
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/users', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $users->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
