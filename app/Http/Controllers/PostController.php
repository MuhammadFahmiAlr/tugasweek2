<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Baris ini wajib ada agar Model terbaca

class PostController extends Controller
{
    public function index()
    {
        // Menggunakan data contoh agar halaman langsung tampil di browser
        $posts = [
            (object)['title' => 'Project Pertama Laravel', 'content' => 'Implementasi arsitektur MVC pada framework Laravel.'],
            (object)['title' => 'Routing dan Middleware', 'content' => 'Mengatur alur permintaan URL ke Controller yang sesuai.']
        ];

        return view('posts.index', compact('posts'));
    }
}
