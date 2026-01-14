<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
    if (Department::count() === 0) {
        return redirect('/dashboard')->with('error', 'Please create a department first.');
    }

    $employees = Employee::with('department')->get(); 
    return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Deleted Successfully!');
    }
}
