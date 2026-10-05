<?php

namespace App\Http\Controllers;

use App\Models\Product; // 1. Tambahkan Model di atas
use Illuminate\Http\Request;

class Acara11Controller extends Controller
{
    public function index()
    {
        // 2. Ambil data asli dari database MySQL
        $daftarProduk = Product::all();

        return view('acara.acara11_produk_index', compact('daftarProduk'));
    }

    public function show($id)
    {
        return view('acara.acara11_produk_detail', compact('id'));
    }
}
