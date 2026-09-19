<?php

use Illuminate\Support\Facades\Route;

// Langkah 1 & 4: Rute Halaman Utama dengan View dan Data
Route::get('/', function () {
    return view('dashboard_pos', [
        'nama_pegawai' => 'Fahmiasligaya', // Menambahkan koma yang hilang dari modul
        'shift' => 'Pagi (08:00-15:00)'
    ]);
});

// Langkah 1: Rute dengan Parameter Wajib & Opsional
Route::get('/produk/{id}', function ($id) {
    return 'Menampilkan data produk dengan ID: ' . $id;
});

Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }
    return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
});

// Langkah 2: Route Groups & Prefix untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {
        return 'Halaman Kelola Produk (Hanya Admin)';
    })->name('admin.produk');

    Route::get('/kategori', function () {
        return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});

// Langkah 2: Route Groups & Prefix untuk Kasir
Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

// Langkah 5 (Tantangan Mandiri): Daftar Produk dengan @foreach
Route::get('/produk-toko', function () {
    $produk = [
        ['nama' => 'Beras Premium 5kg', 'sku' => 'BRS-001', 'harga' => 75000, 'gambar' => asset('images/beras.png'), 'stok' => 50],
        ['nama' => 'Minyak Goreng 2L', 'sku' => 'MYK-002', 'harga' => 35000, 'gambar' => asset('images/minyak.png'), 'stok' => 80],
        ['nama' => 'Gula Pasir 1kg', 'sku' => 'GLA-003', 'harga' => 18000, 'gambar' => asset('images/gula.png'), 'stok' => 120],
        ['nama' => 'Teh Celup isi 25', 'sku' => 'TEH-004', 'harga' => 12000, 'gambar' => asset('images/teh.png'), 'stok' => 65],
        ['nama' => 'Kopi Bubuk 200g', 'sku' => 'KPI-005', 'harga' => 22000, 'gambar' => asset('images/kopi.png'), 'stok' => 45],
    ];

    return view('daftar_produk', ['produk' => $produk]);
});
