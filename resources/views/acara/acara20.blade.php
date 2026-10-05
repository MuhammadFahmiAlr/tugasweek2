<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acara 20 - Form and Validation</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 12px; }
        label { display: block; margin-bottom: 4px; font-weight: bold; }
        input[type="text"], input[type="number"], select { padding: 6px; width: 300px; }
        button { padding: 8px 16px; cursor: pointer; }
        .alert-danger { color: red; margin-bottom: 15px; }
        .alert-success { color: green; margin-bottom: 15px; }
        table { border-collapse: collapse; margin-top: 10px; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Toko FahmiGuanteng Form and Validation</h1>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert-success">
            <strong>Berhasil!</strong> {{ session('success') }}
        </div>
    @endif

    {{-- Menampilkan Pesan Error Validasi --}}
    @if ($errors->any())
        <div class="alert-danger">
            <strong>Terjadi Kesalahan Validasi:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Form Input Produk</h2>
    <form action="{{ url('/acara20/store-form-request') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Contoh: Kopi Singa">
        </div>

        <div class="form-group">
            <label for="sku">SKU (Kode Barcode - Harus KAPITAL / Uppercase):</label>
            <input type="text" name="sku" id="sku" value="{{ old('sku') }}" placeholder="Contoh: KOPSI-001">
        </div>

        <div class="form-group">
            <label for="category_id">Kategori:</label>
            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Harga (Rp):</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="15000">
        </div>

        <div class="form-group">
            <label for="stock">Stok:</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" placeholder="10">
        </div>

        <button type="submit">Simpan Produk</button>
    </form>

    <br><hr><br>

    <h2>Daftar Produk Terbaru</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentProducts as $prod)
            <tr>
                <td>{{ $prod->id }}</td>
                <td>{{ $prod->sku }}</td>
                <td>{{ $prod->name }}</td>
                <td>Rp {{ number_format($prod->price, 0, ',', '.') }}</td>
                <td>{{ $prod->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
