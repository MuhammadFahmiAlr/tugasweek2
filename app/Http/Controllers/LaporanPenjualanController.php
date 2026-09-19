<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    /**
     * Handle the incoming request.
     * Single Action Controller (Invokable)
     */
    public function __invoke(Request $request)
    {
        $statistik = [
            'total_transaksi' => 150,
            'total_pendapatan' => 45750000,
            'rata_rata_per_transaksi' => 305000,
            'produk_terlaris' => 'Laptop ThinkPad',
            'jumlah_pelanggan' => 87,
            'transaksi_per_hari' => [
                ['hari' => 'Senin', 'jumlah' => 25, 'pendapatan' => 7500000],
                ['hari' => 'Selasa', 'jumlah' => 18, 'pendapatan' => 5400000],
                ['hari' => 'Rabu', 'jumlah' => 30, 'pendapatan' => 9000000],
                ['hari' => 'Kamis', 'jumlah' => 22, 'pendapatan' => 6600000],
                ['hari' => 'Jumat', 'jumlah' => 35, 'pendapatan' => 10500000],
                ['hari' => 'Sabtu', 'jumlah' => 15, 'pendapatan' => 4500000],
                ['hari' => 'Minggu', 'jumlah' => 5, 'pendapatan' => 2250000],
            ],
        ];

        return view('laporan.index', compact('statistik'));
    }
}
