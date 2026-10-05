<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
</head>
<body>
    <h1>Rekap Statistik Penjualan</h1>

    <h2>Ringkasan</h2>
    <ul>
        <li><strong>Total Transaksi:</strong> {{ $statistik['total_transaksi'] }}</li>
        <li><strong>Total Pendapatan:</strong> Rp {{ number_format($statistik['total_pendapatan'], 0, ',', '.') }}</li>
        <li><strong>Rata-rata per Transaksi:</strong> Rp {{ number_format($statistik['rata_rata_per_transaksi'], 0, ',', '.') }}</li>
        <li><strong>Produk Terlaris:</strong> {{ $statistik['produk_terlaris'] }}</li>
        <li><strong>Jumlah Pelanggan:</strong> {{ $statistik['jumlah_pelanggan'] }}</li>
    </ul>

    <h2>Detail Transaksi per Hari</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jumlah Transaksi</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistik['transaksi_per_hari'] as $data)
            <tr>
                <td>{{ $data['hari'] }}</td>
                <td>{{ $data['jumlah'] }}</td>
                <td>Rp {{ number_format($data['pendapatan'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ url('/') }}">Kembali ke Beranda</a>
</body>
</html>
