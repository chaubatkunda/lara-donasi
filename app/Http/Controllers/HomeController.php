<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return inertia('Home');
    }

    public function donasi()
    {
        return inertia('Donasi');
    }
}
