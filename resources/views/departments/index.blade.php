@extends('layouts.app')
@section('title', 'Departments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Departments</h3>
    <a href="{{ route('departments.create') }}" class="btn btn-success">Add Department</a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->department_name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('departments.edit', $department) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this department?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
