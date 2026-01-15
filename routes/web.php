<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Middleware\SessionAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/login'));

Route::get('/login', function () {
    if (session()->has('user_id')) return redirect('/dashboard');
    return view('auth.login');
});

Route::get('/register', function () {
    if (session()->has('user_id')) return redirect('/dashboard');
    return view('auth.register');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware([SessionAuth::class])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::resource('employees', EmployeeController::class);

    Route::resource('departments', DepartmentController::class);
});
