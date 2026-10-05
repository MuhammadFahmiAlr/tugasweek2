
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acara 17 - Query Builder (Menu Pengujian)</title>
    <style>
        :root {
            --primary: #2563eb;
            --success: #16a34a;
            --danger: #dc2626;
            --warning: #d97706;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text: #1e293b;
        }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background-color: var(--bg); color: var(--text); margin: 0; padding: 32px 16px; }
        .container { max-width: 900px; margin: 0 auto; }
        .header { background: #ffffff; border: 1px solid var(--border); border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 6px rgba(0,0,0,0.03); }
        .header h1 { margin: 0 0 6px 0; font-size: 1.6rem; color: #0f172a; }
        .header p { margin: 0; color: #64748b; font-size: 0.95rem; }
        
        .list-group { display: flex; flex-direction: column; gap: 12px; }
        .item { background: var(--card-bg); border: 1px solid var(--border); border-radius: 10px; padding: 18px 20px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
        .item-info h3 { margin: 0 0 4px 0; font-size: 1.05rem; color: #1e293b; }
        .item-info span { font-size: 0.88rem; color: #64748b; }
        .item-info code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 0.85rem; color: #0f172a; }
        
        .btn { text-decoration: none; padding: 9px 18px; border-radius: 8px; font-size: 0.88rem; font-weight: 600; color: #fff; background: var(--primary); transition: background 0.2s; white-space: nowrap; }
        .btn:hover { background: #1d4ed8; }
        .btn-success { background: var(--success); }
        .btn-success:hover { background: #15803d; }
        .btn-warning { background: var(--warning); }
        .btn-warning:hover { background: #b45309; }
        .btn-danger { background: var(--danger); }
        .btn-danger:hover { background: #b91c1c; }
        
        .nav-acara { display: flex; gap: 10px; margin-top: 24px; }
        .nav-acara a { text-decoration: none; color: #475569; font-weight: 500; font-size: 0.9rem; padding: 8px 14px; background: #e2e8f0; border-radius: 6px; }
        .nav-acara a:hover { background: #cbd5e1; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Acara 17 - Query Builder</h1>
            <p>Pilih rute aksi di bawah untuk menjalankan dan menguji query praktikum secara langsung:</p>
        </div>

        <div class="list-group">
            <div class="item">
                <div class="item-info">
                    <h3>1. Tambah Data Produk Baru (Insert)</h3>
                    <span>URL: <code>/acara17/insert</code> &mdash; Menambahkan 1 baris produk baru ke database</span>
                </div>
                <a href="{{ url('/acara17/insert') }}" class="btn btn-success">Uji Insert</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>2. Tampilkan Semua Produk (Select)</h3>
                    <span>URL: <code>/acara17/select</code> &mdash; Mengambil dan menampilkan semua baris data produk</span>
                </div>
                <a href="{{ url('/acara17/select') }}" class="btn">Uji Select</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>3. Filter Produk Harga &ge; 20.000 (Where)</h3>
                    <span>URL: <code>/acara17/where</code> &mdash; Menampilkan produk dengan kondisi harga tertentu</span>
                </div>
                <a href="{{ url('/acara17/where') }}" class="btn">Uji Where</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>4. Perbarui Data Produk Terakhir (Update)</h3>
                    <span>URL: <code>/acara17/update</code> &mdash; Mengubah harga/stok produk di database</span>
                </div>
                <a href="{{ url('/acara17/update') }}" class="btn btn-warning">Uji Update</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>5. Hapus Produk Terakhir (Delete)</h3>
                    <span>URL: <code>/acara17/delete</code> &mdash; Menghapus 1 baris produk dari database</span>
                </div>
                <a href="{{ url('/acara17/delete') }}" class="btn btn-danger">Uji Delete</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>6. Gabungkan Tabel Produk & Kategori (Join)</h3>
                    <span>URL: <code>/acara17/join</code> &mdash; Mengambil data produk beserta nama kategorinya</span>
                </div>
                <a href="{{ url('/acara17/join') }}" class="btn">Uji Join</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>7. Fungsi Agregat (Count, Sum, Avg, Max, Min)</h3>
                    <span>URL: <code>/acara17/agregat</code> &mdash; Menghitung total data, jumlah harga, rata-rata, dll</span>
                </div>
                <a href="{{ url('/acara17/agregat') }}" class="btn">Uji Agregat</a>
            </div>
        </div>

        <div class="nav-acara">
            <span style="align-self: center; font-size: 0.88rem; color: #64748b;">Navigasi Acara:</span>
            <a href="{{ url('/acara18') }}">Ke Acara 18 (Eloquent Part 1) &rarr;</a>
            <a href="{{ url('/acara19') }}">Ke Acara 19 (Eloquent Part 2) &rarr;</a>
            <a href="{{ url('/') }}">Beranda</a>
        </div>
    </div>
</body>
</html>
