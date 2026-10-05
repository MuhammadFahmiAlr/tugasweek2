<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acara 19 - Eloquent ORM (Part 2 - Lanjutan)</title>
    <style>
        :root {
            --primary: #7c3aed;
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
        .btn:hover { background: #6d28d9; }
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
            <h1>Acara 19 - Eloquent ORM (Part 2 - Fitur Lanjutan)</h1>
            <p>Pilih rute aksi di bawah untuk menjalankan pengujian fitur lanjutan Eloquent ORM:</p>
        </div>

        <div class="list-group">
            <div class="item">
                <div class="item-info">
                    <h3>1. Filter Rentang Nilai (whereBetween)</h3>
                    <span>URL: <code>/acara19/where</code> &mdash; Mengambil produk pada rentang harga Rp 10.000 s/d Rp 50.000</span>
                </div>
                <a href="{{ url('/acara19/where') }}" class="btn">Uji whereBetween</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>2. Relasi Antar Model (hasMany & belongsTo)</h3>
                    <span>URL: <code>/acara19/relasi</code> &mdash; Menampilkan daftar kategori beserta produk yang berelasi</span>
                </div>
                <a href="{{ url('/acara19/relasi') }}" class="btn">Uji Relasi</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>3. Accessor & Mutator Model</h3>
                    <span>URL: <code>/acara19/accessor-mutator</code> &mdash; Mengubah format input nama dan tampilan format harga</span>
                </div>
                <a href="{{ url('/acara19/accessor-mutator') }}" class="btn btn-success">Uji Accessor & Mutator</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>4. Soft Delete (Penghapusan Sementara)</h3>
                    <span>URL: <code>/acara19/soft-delete</code> &mdash; Memindahkan produk ke Trash tanpa menghapusnya dari database</span>
                </div>
                <a href="{{ url('/acara19/soft-delete') }}" class="btn btn-danger">Uji Soft Delete</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>5. Melihat Data di Trash (onlyTrashed)</h3>
                    <span>URL: <code>/acara19/trash</code> &mdash; Menampilkan semua produk yang sedang berada di Trash</span>
                </div>
                <a href="{{ url('/acara19/trash') }}" class="btn">Uji Trash</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>6. Restore Data dari Trash (restore)</h3>
                    <span>URL: <code>/acara19/restore</code> &mdash; Mengembalikan data dari Trash ke tabel aktif</span>
                </div>
                <a href="{{ url('/acara19/restore') }}" class="btn btn-warning">Uji Restore</a>
            </div>

            <div class="item">
                <div class="item-info">
                    <h3>7. Local Query Scope (Product::cheap())</h3>
                    <span>URL: <code>/acara19/scope</code> &mdash; Mengambil produk murah menggunakan query scope kustom</span>
                </div>
                <a href="{{ url('/acara19/scope') }}" class="btn">Uji Scope</a>
            </div>
        </div>

        <div class="nav-acara">
            <span style="align-self: center; font-size: 0.88rem; color: #64748b;">Navigasi Acara:</span>
            <a href="{{ url('/acara17') }}">&larr; Ke Acara 17 (Query Builder)</a>
            <a href="{{ url('/acara18') }}">&larr; Ke Acara 18 (Eloquent Part 1)</a>
            <a href="{{ url('/') }}">Beranda</a>
        </div>
    </div>
</body>
</html>
