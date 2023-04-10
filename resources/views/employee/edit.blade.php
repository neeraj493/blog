@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update Employee</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Logo</label>
                    <select name="company_id"  class="form-control" id="company_id">
                    <option value="">Select</option>
                        @foreach($comapny as $value)
                    <option value="{{$value->id}}"{{ $value->id == $employee->company_id ? 'selected' : '' }}>{{$value->name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('company_id'))
                        <span class="text-danger text-left">{{ $errors->first('company_id') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="f_name" class="form-label">First name</label>
                    <input value="{{ $employee->f_name }}" 
                        type="text" 
                        class="form-control" 
                        name="f_name" 
                        placeholder="f_name" required>

                    @if ($errors->has('f_name'))
                        <span class="text-danger text-left">{{ $errors->first('f_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="f_name" class="form-label">Last name</label>
                    <input value="{{ $employee->l_name }}" 
                        type="text" 
                        class="form-control" 
                        name="l_name" 
                        placeholder="l_name" required>

                    @if ($errors->has('l_name'))
                        <span class="text-danger text-left">{{ $errors->first('L_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $employee->email }}"
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
                    <input value="{{ $employee->phone }}"
                        type="text" 
                        class="form-control" 
                        name="phone" 
                        placeholder="phone" required>
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Employee</button>
                <a href="{{ route('employee.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection
