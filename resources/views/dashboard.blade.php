@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card border-0 shadow-sm p-5 mt-5 text-center">
    <h2 class="mb-3 fw-bold">Welcome, {{ session('name') }}</h2>
    <p class="mb-4 text-muted">
        Use the buttons below to manage your system. 
        You need to have at least one department created before adding employees.
    </p>

    <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="{{ route('departments.index') }}" 
           class="btn btn-lg px-5 py-3 rounded-pill text-white fw-semibold"
           style="background-color: #20c997; border: none;">
            Manage Departments
        </a>

        @php
            $departmentsCount = \App\Models\Department::count();
        @endphp
        <a href="{{ $departmentsCount ? route('employees.index') : '#' }}" 
           class="btn btn-lg px-5 py-3 rounded-pill text-white fw-semibold {{ $departmentsCount ? '' : 'disabled' }}"
           style="background-color: {{ $departmentsCount ? '#0d6efd' : '#adb5bd' }}; border: none; cursor: {{ $departmentsCount ? 'pointer' : 'not-allowed' }};">
            Manage Employees
        </a>
    </div>

    @if(!$departmentsCount)
        <p class="mt-3 text-muted">
            You must create a department first to enable employee management.
        </p>
    @endif
</div>
@endsection
