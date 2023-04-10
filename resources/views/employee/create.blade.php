@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new Employee</h1>
        <div class="lead">
            Add new Employee and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Logo</label>
                    <select name="company_id"  class="form-control" id="company_id">
                    <option value="">Select</option>
                        @foreach($comapny as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('company_id'))
                        <span class="text-danger text-left">{{ $errors->first('company_id') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="f_name" class="form-label">First Name</label>
                    <input value="{{ old('f_name') }}" 
                        type="text" 
                        class="form-control" 
                        name="f_name" 
                        placeholder="first name" required>

                    @if ($errors->has('f_name'))
                        <span class="text-danger text-left">{{ $errors->first('f_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="l_name" class="form-label">last Name</label>
                    <input value="{{ old('l_name') }}" 
                        type="text" 
                        class="form-control" 
                        name="l_name" 
                        placeholder="last name" required>

                    @if ($errors->has('l_name'))
                        <span class="text-danger text-left">{{ $errors->first('l_name') }}</span>
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
                    <label for="phone" class="form-label">phone</label>
                    <input value="{{ old('phone') }}"
                        type="text" 
                        class="form-control" 
                        name="phone" 
                        placeholder="phone" required>
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save Employee</button>
                <a href="{{ route('employee.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
