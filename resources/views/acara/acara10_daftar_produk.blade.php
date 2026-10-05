<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - POS Toko Kelontong</title>
</head>
<body>
    <header>
        <h2>Daftar Produk Toko Kelontong</h2>
        <hr>
    </header>

    <main>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>SKU</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['sku'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td><img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" width="80" height="80"></td>
                    <td>{{ $item['stok'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        <hr>
        <p>&copy; 2026 POS Toko Kelontong - Praktikum Pemrograman Web</p>
    </footer>
</body>
</html>
