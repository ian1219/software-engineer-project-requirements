@extends('layouts.app')
@section('title', 'Employees')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Employees</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->department->department_name ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this employee?')">
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
