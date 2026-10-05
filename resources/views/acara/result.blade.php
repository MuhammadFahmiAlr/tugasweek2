<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hasil Uji Coba Praktikum' }}</title>
    <style>
        :root {
            --primary: #2563eb;
            --success: #16a34a;
            --danger: #dc2626;
            --warning: #d97706;
            --info: #0284c7;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text: #1e293b;
        }
        * { box-sizing: border-box; }
        body { font-family: system-ui, -apple-system, sans-serif; background-color: var(--bg); color: var(--text); margin: 0; padding: 32px 16px; }
        .container { max-width: 900px; margin: 0 auto; }
        .nav-back { margin-bottom: 20px; }
        .nav-back a { display: inline-flex; align-items: center; gap: 6px; text-decoration: none; color: var(--primary); font-weight: 600; font-size: 0.95rem; }
        .nav-back a:hover { text-decoration: underline; }
        .card { background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; padding: 24px 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); margin-bottom: 24px; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; margin-bottom: 12px; }
        .badge-success { background: #dcfce7; color: #15803d; }
        .badge-danger { background: #fee2e2; color: #b91c1c; }
        .badge-warning { background: #fef3c7; color: #b45309; }
        .badge-info { background: #e0f2fe; color: #0369a1; }
        h1 { margin: 0 0 8px 0; font-size: 1.5rem; color: #0f172a; }
        .desc { color: #64748b; margin: 0 0 20px 0; font-size: 0.95rem; }
        
        .alert-box { padding: 16px 20px; border-radius: 8px; font-size: 1rem; font-weight: 500; margin-bottom: 20px; display: flex; align-items: flex-start; gap: 12px; }
        .alert-box.success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
        .alert-box.danger { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .alert-box.warning { background: #fffbeb; border: 1px solid #fde68a; color: #92400e; }
        .alert-box.info { background: #f0f9ff; border: 1px solid #bae6fd; color: #075985; }

        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid var(--border); padding: 10px 14px; text-align: left; font-size: 0.9rem; }
        th { background: #f1f5f9; color: #334155; font-weight: 600; }
        tr:nth-child(even) { background: #f8fafc; }
        code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-family: monospace; font-size: 0.88rem; color: #0f172a; }
        
        .action-links { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--border); }
        .btn-link { text-decoration: none; padding: 8px 14px; border-radius: 6px; font-size: 0.88rem; font-weight: 500; background: #f1f5f9; color: #334155; border: 1px solid var(--border); transition: all 0.2s; }
        .btn-link:hover { background: #e2e8f0; color: #0f172a; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-back">
            <a href="{{ $backUrl ?? url('/') }}">&larr; Kembali ke Menu {{ $acaraName ?? 'Acara' }}</a>
        </div>

        <div class="card">
            @if(isset($statusType))
                <span class="badge badge-{{ $statusType }}">{{ strtoupper($statusType) }}</span>
            @endif

            <h1>{{ $actionTitle ?? 'Hasil Aksi Database' }}</h1>
            <p class="desc">Rute: <code>{{ request()->path() }}</code></p>

            @if(isset($message))
                <div class="alert-box {{ $statusType ?? 'success' }}">
                    <div>{!! $message !!}</div>
                </div>
            @endif

            {{-- Jika ada data tabel untuk ditampilkan --}}
            @if(isset($tableData) && count($tableData) > 0)
                <h3>{{ $tableTitle ?? 'Data Hasil Query:' }}</h3>
                <table>
                    <thead>
                        <tr>
                            @foreach($columns as $colKey => $colLabel)
                                <th>{{ $colLabel }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tableData as $row)
                        <tr>
                            @foreach($columns as $colKey => $colLabel)
                                <td>
                                    @if(is_array($row))
                                        {{ $row[$colKey] ?? '-' }}
                                    @elseif(is_object($row))
                                        {{ $row->$colKey ?? '-' }}
                                    @else
                                        {{ $row }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @elseif(isset($tableData) && count($tableData) == 0)
                <p><em>(Tidak ada data yang ditemukan)</em></p>
            @endif

            {{-- Navigasi aksi lainnya di acara yang sama --}}
            @if(isset($quickLinks))
                <div class="action-links">
                    <span style="align-self: center; font-size: 0.85rem; color: #64748b; font-weight: 600;">Langkah Lainnya:</span>
                    @foreach($quickLinks as $label => $url)
                        <a href="{{ url($url) }}" class="btn-link">{{ $label }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
