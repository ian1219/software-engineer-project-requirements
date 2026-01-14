@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Create Department</h3>

    <form method="POST" action="{{ route('departments.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input
                type="text"
                name="department_name"
                class="form-control @error('department_name') is-invalid @enderror"
                value="{{ old('department_name') }}"
                required
            >
            @error('department_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection
