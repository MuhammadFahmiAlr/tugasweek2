<?php

namespace App\Http\Controllers;

use App\Models\Product; // Wajib memanggil Model di bagian atas
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Contoh kode untuk menyimpan data ke database
        Product::create([
            'nama' => 'Laptop',
            'harga' => 15000000,
            'stok' => 10
        ]);

        return "Data produk berhasil disimpan!" . PHP_EOL;
    }

    public function index()
    {
        // Contoh kode untuk mengambil semua data dari database
        $products = Product::all();
        return $products;
    }
}
