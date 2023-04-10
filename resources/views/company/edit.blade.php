@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update company</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('company.update', $companymodel->id) }}" enctype="multipart/form-data">
                @method('patch')
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
                    <input value="{{ $companymodel->name }}" 
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
                    <input value="{{ $companymodel->email }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">website</label>
                    <input value="{{ $companymodel->website }}"
                        type="text" 
                        class="form-control" 
                        name="website" 
                        placeholder="website" required>
                    @if ($errors->has('website'))
                        <span class="text-danger text-left">{{ $errors->first('website') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Company</button>
                <a href="{{ route('company.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection
