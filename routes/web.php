<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\BookController;

// ============================================================
// ACARA 13: Controller
// ============================================================
Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::post('/book', [BookController::class, 'store']);
Route::put('/book/{id}', [BookController::class, 'update']);
Route::delete('/book/{id}', [BookController::class, 'destroy']);

// Langkah 1 & 4: Rute Halaman Utama dengan View dan Data
Route::get('/', function () {
    return view('dashboard_pos', [
        'nama_pegawai' => 'Fahmiasligaya', // Menambahkan koma yang hilang dari modul
        'shift' => 'Pagi (08:00-15:00)'
    ]);
});

// ============================================================
// ACARA 11: MVC & Controller
// ============================================================

// Routing menuju ProdukController
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);

// Latihan Mandiri: Single Action Controller (Invokable)
Route::get('/laporan', LaporanPenjualanController::class);

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

// ============================================================
// ACARA 9: Route (Part 1)
// ============================================================

// 1. Basic Routing
Route::get('/hello', function () {
    return "Hello, World!";
});

// 2. Route Parameters
// Parameter Wajib
Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});

// Parameter Opsional (dengan nilai default "Guest")
Route::get('/user/{name?}', function ($name = "Guest") {
    return "Hello, " . $name;
});

// 3. Named Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ============================================================
// ACARA 10: Route (Part 2)
// ============================================================

// 1. Route Groups (prefix 'admin')
// Catatan: prefix 'admin' sudah ada di atas, jadi kita gunakan komentar
// untuk menunjukkan contoh dari modul. Rute ini akan menimpa/menambah
// pada prefix admin yang sudah ada.
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    });

    Route::get('/users', function () {
        return "Admin Users";
    });
});

// 2. Route Methods
Route::get('/data', function () { return "GET Request"; });
Route::post('/data', function () { return "POST Request"; });
Route::put('/data', function () { return "PUT Request"; });
Route::delete('/data', function () { return "DELETE Request"; });
Route::patch('/data', function () { return "PATCH Request"; });

// 3. Fallback Routes (harus diletakkan paling bawah)
Route::fallback(function () {
    return "404 Not Found";
});
