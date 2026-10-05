<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Acara11Controller;
use App\Http\Controllers\Acara11LaporanController;
use App\Http\Controllers\Acara13Controller;

// ============================================================
// ACARA 13: Controller
// ============================================================
Route::get('/book', [Acara13Controller::class, 'index']);
Route::get('/book/{id}', [Acara13Controller::class, 'show']);
Route::post('/book', [Acara13Controller::class, 'store']);
Route::put('/book/{id}', [Acara13Controller::class, 'update']);
Route::delete('/book/{id}', [Acara13Controller::class, 'destroy']);

// Langkah 1 & 4: Rute Halaman Utama dengan View dan Data
Route::get('/', function () {
    return view('welcome');
});

// ============================================================
// ACARA 11: MVC & Controller
// ============================================================

// Routing menuju Acara11Controller (ProdukController)
Route::get('/produk', [Acara11Controller::class, 'index']);
Route::get('/produk/{id}', [Acara11Controller::class, 'show']);

// Latihan Mandiri: Single Action Controller (Invokable)
Route::get('/laporan', Acara11LaporanController::class);

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

    return view('acara.acara10_daftar_produk', ['produk' => $produk]);
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

// ============================================================
// ACARA 10: Route (Part 2)
// ============================================================

// 1. Route Groups (prefix 'admin')
Route::prefix('admin')->group(function () {
    Route::get('/dashboard-old', function () {
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

use App\Http\Controllers\Acara17Controller;
use App\Http\Controllers\Acara18Controller;
use App\Http\Controllers\Acara19Controller;
use App\Http\Controllers\Acara20Controller;

// ============================================================
// ACARA 17: Query Builder
// ============================================================
Route::prefix('acara17')->group(function () {
    Route::get('/insert', [Acara17Controller::class, 'insert']);
    Route::get('/select', [Acara17Controller::class, 'select']);
    Route::get('/where', [Acara17Controller::class, 'where']);
    Route::get('/update', [Acara17Controller::class, 'update']);
    Route::get('/delete', [Acara17Controller::class, 'delete']);
    Route::get('/join', [Acara17Controller::class, 'join']);
    Route::get('/agregat', [Acara17Controller::class, 'agregat']);
});

// ============================================================
// ACARA 18: Eloquent ORM (Part 1 - Basic CRUD)
// ============================================================
Route::prefix('acara18')->group(function () {
    Route::get('/create', [Acara18Controller::class, 'create']);
    Route::get('/save', [Acara18Controller::class, 'save']);
    Route::get('/all', [Acara18Controller::class, 'all']);
    Route::get('/where', [Acara18Controller::class, 'where']);
    Route::get('/update', [Acara18Controller::class, 'update']);
    Route::get('/delete', [Acara18Controller::class, 'delete']);
});

// ============================================================
// ACARA 19: Eloquent ORM (Part 2 - Advanced Eloquent)
// ============================================================
Route::prefix('acara19')->group(function () {
    Route::get('/where', [Acara19Controller::class, 'where']);
    Route::get('/relasi', [Acara19Controller::class, 'relasi']);
    Route::get('/accessor-mutator', [Acara19Controller::class, 'accessorMutator']);
    Route::get('/soft-delete', [Acara19Controller::class, 'softDelete']);
    Route::get('/trash', [Acara19Controller::class, 'trash']);
    Route::get('/restore', [Acara19Controller::class, 'restore']);
    Route::get('/scope', [Acara19Controller::class, 'scope']);
});

// ============================================================
// ACARA 20: Form & Validation
// ============================================================
Route::get('/acara20', [Acara20Controller::class, 'index']);
Route::post('/acara20/store-basic', [Acara20Controller::class, 'storeBasic']);
Route::post('/acara20/store-form-request', [Acara20Controller::class, 'storeFormRequest']);

use App\Http\Controllers\Acara22AuthController;

// ============================================================
// ACARA 21: Middleware
// ============================================================
Route::get('/acara21/admin', function () {
    return "Selamat datang di Halaman Admin Acara 21!";
})->middleware('acara21_admin');

Route::get('/acara21/cek-role/{role}', function ($role) {
    return "Halaman Role " . $role . " Acara 21";
})->middleware('acara21_cek_role');

// ============================================================
// ACARA 22: Authentication (Manual)
// ============================================================
Route::get('/acara22/login', [Acara22AuthController::class, 'showLogin']);
Route::post('/acara22/login', [Acara22AuthController::class, 'login']);
Route::get('/acara22/register', [Acara22AuthController::class, 'showRegister']);
Route::post('/acara22/register', [Acara22AuthController::class, 'register']);
Route::post('/acara22/logout', [Acara22AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/acara22/dashboard', [Acara22AuthController::class, 'dashboard']);
});

// ============================================================
// BREEZE: Dashboard & Profile (dari Laravel Breeze)
// ============================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================================================
// PROSEDUR KERJA PRAKTIKUM: Authentication & Middleware
// ============================================================
// Langkah 10: Route Berdasarkan Role

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;

Route::middleware(['auth'])->group(function () {
    // Khusus Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Khusus Kasir
    Route::middleware('role:kasir')->group(function () {
        Route::get('/kasir/dashboard', [KasirController::class, 'dashboard'])->name('kasir.dashboard');
    });
});

// 3. Fallback Routes (harus diletakkan paling bawah)
Route::fallback(function () {
    return "404 Not Found";
});

require __DIR__.'/auth.php';
