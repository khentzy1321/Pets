<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        // Perform registration logic here
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        
        // Example: Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Redirect to the desired page after successful registration
        return redirect()->intended('/login');
    }
}
