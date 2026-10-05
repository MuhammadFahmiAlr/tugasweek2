<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT. Indofood Sukses Makmur Tbk',
                'phone' => '021-57945959',
                'address' => 'Sudirman Plaza, Indofood Tower, Jl. Jend. Sudirman Kav. 76-78, Jakarta 12910',
            ],
            [
                'name' => 'PT. Unilever Indonesia Tbk',
                'phone' => '021-78322577',
                'address' => 'Grha Unilever, BSD Green Office Park, Jl. BSD Boulevard Barat, Tangerang 15345',
            ],
            [
                'name' => 'PT. Wings Surya',
                'phone' => '031-8431663',
                'address' => 'Jl. Kalisosok Kidul No. 2, Surabaya, Jawa Timur 60175',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
