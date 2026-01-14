@extends('layouts.app')
@section('title', 'Edit Employee')

@section('content')
<div class="card shadow-sm p-4 mt-4">
    <h4 class="mb-4">Edit Employee</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name) }}">
            </div>
            <div class="col-md-6">
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name) }}">
            </div>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
        </div>

        <div class="mb-3">
            <select name="department_id" class="form-control">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
