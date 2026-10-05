<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder Kategori terlebih dahulu 
        //    agar data kategorinya ada
        $this->call(CategorySeeder::class);

        // 2. Jalankan Factory Produk untuk membuat 50 
        //    data dummy produk
        \App\Models\Product::factory(50)->create();

        // 3. Jalankan Seeder Supplier
        $this->call(SupplierSeeder::class);

        // 4. Jalankan UserSeeder (Prosedur Kerja Praktikum - Langkah 5)
        $this->call(UserSeeder::class);
    }
}
