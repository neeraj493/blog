@extends('layouts.app-master')

@section('content')
    
    <h1 class="mb-3">crud</h1>

    <div class="bg-light p-4 rounded">
        <h1>Employee</h1>
        <div class="lead">
            Manage your employees here.
            <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm float-right">Add new Employee</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="15%">#</th>
                <th scope="col" width="15%">Company</th>
                <th scope="col" width="15%">First Name</th>
                <th scope="col" width="15%">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="15%">Phone</th>
                <th scope="col" width="1%" colspan="3">action </th>    
            </tr>
            </thead>
            <tbody>
                @foreach($employees as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <th scope="row">{{$user->company->name}}</th>
                        <td>{{ $user->f_name }}</td>
                        <td>{{ $user->l_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><a href="{{ route('employee.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $employees->links() !!}
        </div>

    </div>
@endsection
