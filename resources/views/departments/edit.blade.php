@extends('layouts.app')
@section('title', 'Edit Department')

@section('content')
<div class="card shadow-sm p-4 mt-4">
    <h4 class="mb-4">Edit Department</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.update', $department) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <input type="text"
                   name="department_name"
                   class="form-control"
                   value="{{ old('department_name', $department->department_name) }}">
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
