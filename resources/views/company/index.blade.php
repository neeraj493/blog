@extends('layouts.app-master')

@section('content')
    
    <h1 class="mb-3">crud</h1>

    <div class="bg-light p-4 rounded">
        <h1>Companys</h1>
        <div class="lead">
            Manage your Company here.
            <a href="{{ route('company.create') }}" class="btn btn-primary btn-sm float-right">Add new company</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="15%">#</th>
                <th scope="col" width="15%">Logo</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="15%">website</th>
                <th scope="col" width="1%" colspan="3">action </th>    
            </tr>
            </thead>
            <tbody>
                @foreach($companys as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <th scope="row"><img src="/logo/{{ $user->image }}" width="100px"></th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->website }}</td>
                        <td><a href="{{ route('company.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['company.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $companys->links() !!}
        </div>

    </div>
@endsection
