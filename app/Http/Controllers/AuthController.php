<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function index()
    {
        return view('auth.login');
    }

    // Alias of index() — OK to keep if you use both
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Optional: validate inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            // Role-based dashboard routing
            switch ($role) {
                case 'checker':
                    return view('branches.index');
                case 'distributor':
                    return view('distributor.dashboard');
                case 'purchaser':
                    return view('purchaser.dashbaord');
                case 'supplier':
                    return view('supplier.dashboard');
                default:
                    return view('admin.index');
            }
        }

        // If login fails
        return back()
            ->withErrors([
                'email' => 'Invalid credentials.',
            ])
            ->withInput();
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // (Optional) General dashboard handler
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}

