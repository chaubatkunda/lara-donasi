<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return inertia('Home');
    }

    public function kumpuldonasi($slug)
    {
        return inertia('Donasi');
    }

    public function nominaldonasi($slug)
    {
        return inertia('NominalDonasi');
    }

    public function donasisaya()
    {
        return inertia('DonasiSaya');
    }



    public function galangdana()
    {
        return inertia('GalangDana');
    }
}
