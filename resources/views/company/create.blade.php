@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new company</h1>
        <div class="lead">
            Add new company and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Logo</label>
                    <input value="{{ old('image') }}" 
                        type="file" 
                        class="form-control" 
                        name="image" 
                        placeholder="image" required>

                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input value="{{ old('website') }}"
                        type="text" 
                        class="form-control" 
                        name="website" 
                        placeholder="website" required>
                    @if ($errors->has('website'))
                        <span class="text-danger text-left">{{ $errors->first('website') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save Company</button>
                <a href="{{ route('company.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
