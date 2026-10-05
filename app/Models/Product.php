<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // Mass Assignment Protection: Kolom yang boleh diisi
    protected $fillable = ['category_id', 'name', 'sku', 'price', 'stock'];

    // Relasi: Product belongsTo Category (Many to One)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Accessor: Mengubah format harga sebelum ditampilkan
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    // Mutator: Mengubah nama produk menjadi Kapital/Format khusus sebelum disimpan
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    // Local Scope: Filter produk murah (harga <= 20000)
    public function scopeCheap($query)
    {
        return $query->where('price', '<=', 20000);
    }
}
