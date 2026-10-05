<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relasi: Category hasMany Product (One to Many)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
