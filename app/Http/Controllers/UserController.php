<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        
        $users = User::paginate(5)->through(fn ($user)=>[
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);

        return Inertia::render('User/Index', compact('users'));
    }
}
