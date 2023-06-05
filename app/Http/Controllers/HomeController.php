<?php

namespace App\Http\Controllers;



class HomeController extends CarController
{
    public function index()
    {

        return inertia('Welcome');
    }

}
