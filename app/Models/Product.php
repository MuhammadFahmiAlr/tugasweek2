<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database secara spesifik
    protected $table = 'product';

    // Menentukan kolom mana saja yang boleh diisi
    protected $fillable = ['nama', 'harga', 'stok'];
}
