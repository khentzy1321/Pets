<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $data = Pet::get();
        $user = User::get();
     
        $count = Pet::count();
        $countUser = User::count();

    
        return Inertia::render('Dashboard', [
            'petCount' => $count,
            'userCount' => $countUser,
        ])->withViewData(['data' => $data, 'user' => $user]);
    }
}
