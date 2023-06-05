<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('Auth/Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        // Perform login logic here
        
        // Example: Check credentials and authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/cars/index');
        } else {
            // Authentication failed
            return back()->withErrors(['message' => 'Invalid login credentials']);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}

