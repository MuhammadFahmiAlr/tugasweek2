<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return "Menampilkan semua book" . PHP_EOL;
    }

    public function show($id) {
        return "Menampilkan produk dengan ID: " . $id . PHP_EOL;
    }

    public function create() {
        return "Form tambah produk" . PHP_EOL;
    }

    public function store(Request $request) {
        return "Menyimpan produk baru" . PHP_EOL;
    }

    public function edit($id) {
        return "Form edit produk dengan ID: " . $id . PHP_EOL;
    }

    public function update(Request $request, $id) {
        return "Mengupdate produk dengan ID: " . $id . PHP_EOL;
    }

    public function destroy($id) {
        return "Menghapus produk dengan ID: " . $id . PHP_EOL;
    }
}
