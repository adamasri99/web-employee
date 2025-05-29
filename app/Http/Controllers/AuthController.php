<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // Default role
    ]);

    Auth::login($user);

    // Redirect new users to create their profile
    return redirect()->route('employee.create');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        if (Auth::user()->role === 'admin') {
            return redirect()->route('employee.index');
        } else {
            // Check if user has an employee profile
            $employee = \App\Models\Employee::where('user_id', Auth::id())->first();
            if ($employee) {
                return redirect()->route('employee.show', $employee->id);
            } else {
                return redirect()->route('employee.create');
            }
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
