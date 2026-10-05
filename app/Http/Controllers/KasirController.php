<?php

namespace App\Http\Controllers;

class KasirController extends Controller
{
    public function dashboard()
    {
        return view()->exists('kasir.dashboard') 
            ? view('kasir.dashboard') 
            : view('praktikum.kasir.dashboard');
    }
}


