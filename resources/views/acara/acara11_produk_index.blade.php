<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Katalog Produk Database</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarProduk as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->sku }}</td>
                <td>{{ $item->name }}</td>
                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td>{{ $item->stock }}</td>
                <td><a href="{{ url('/produk/' . $item->id) }}">Lihat Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
