<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view()->exists('admin.dashboard') 
            ? view('admin.dashboard') 
            : view('praktikum.admin.dashboard');
    }
}


