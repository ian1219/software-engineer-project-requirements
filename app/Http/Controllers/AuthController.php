<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        return redirect('/login');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        session([
            'user_id' => $user->id,
            'name' => $user->name
        ]);

        return redirect('/dashboard');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        session()->flush(); // remove all session data
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
