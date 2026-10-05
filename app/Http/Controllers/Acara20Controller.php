<?php

namespace App\Http\Controllers;

use App\Http\Requests\Acara20ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Acara20Controller extends Controller
{
    /**
     * Menampilkan Form Input Produk (Acara 20)
     */
    public function index()
    {
        $categories = Category::all();
        $recentProducts = Product::latest()->limit(5)->get();

        return view('acara.acara20', compact('categories', 'recentProducts'));
    }

    /**
     * Validasi di Controller dengan Custom Message
     */
    public function storeBasic(Request $request)
    {
        $messages = [
            'name.required'  => 'Nama produk wajib diisi dari Controller!',
            'price.required' => 'Harga produk wajib diisi dari Controller!',
        ];

        $request->validate([
            'name'  => 'required|min:3|max:50',
            'price' => 'required|numeric|min:1000',
        ], $messages);

        return back()->with('success', 'Validasi Controller Berhasil! (Data valid)');
    }

    /**
     * Validasi Menggunakan Form Request & Custom Rule
     */
    public function storeFormRequest(Acara20ProductRequest $request)
    {
        // Data otomatis tervalidasi via ProductRequest
        Product::create($request->validated());

        return back()->with('success', 'Produk berhasil ditambahkan melalui Form Request Validation!');
    }
}
