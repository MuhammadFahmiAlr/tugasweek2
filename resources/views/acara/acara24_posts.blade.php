<!DOCTYPE html>
<html>
<head><title>Posts - Acara 24 Authorization</title></head>
<body>
    <h2>Acara 24 - Authorization (Gates & Policies)</h2>

    @auth
        <p>Login sebagai: <strong>{{ Auth::user()->name }}</strong> (ID: {{ Auth::id() }})</p>
        <a href="{{ url('/acara23/dashboard') }}">Kembali ke Dashboard</a>

        @if(session('success'))
            <div style="color: green; margin: 10px 0; padding: 10px; border: 1px solid green;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Tambah Post Baru --}}
        <h3>Tambah Post Baru</h3>
        <form action="{{ url('/acara24/posts') }}" method="POST">
            @csrf
            <label>Judul:</label><br>
            <input type="text" name="title" required style="width: 300px;"><br>
            <label>Konten:</label><br>
            <textarea name="content" required style="width: 300px; height: 100px;"></textarea><br><br>
            <button type="submit">Buat Post</button>
        </form>

        {{-- Daftar Semua Post --}}
        <h3>Daftar Post</h3>
        @if($posts->isEmpty())
            <p>Belum ada post.</p>
        @else
            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Pemilik (user_id)</th>
                    <th>Aksi</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>{{ $post->user ? $post->user->name : 'N/A' }} (ID: {{ $post->user_id }})</td>
                        <td>
                            {{-- Prosedur 1c: Menggunakan Gate dalam Blade --}}
                            @can('edit-post', $post)
                                <a href="{{ url('/acara24/posts/'.$post->id.'/edit') }}">Edit</a>
                            @endcan

                            {{-- Prosedur 2e: Menggunakan Policy dalam Blade --}}
                            @can('update', $post)
                                <form action="{{ url('/acara24/posts/'.$post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            @endcan

                            @cannot('edit-post', $post)
                                <span style="color: gray;">(Bukan milik Anda)</span>
                            @endcannot
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif

        <hr>
        <h3>Keterangan Authorization:</h3>
        <ul>
            <li><strong>Gate 'edit-post'</strong>: Tombol Edit hanya muncul jika Anda pemilik post (didefinisikan di AppServiceProvider)</li>
            <li><strong>Policy 'update'</strong>: Tombol Hapus hanya muncul jika Anda pemilik post (didefinisikan di PostPolicy)</li>
            <li><strong>Middleware 'can:update,post'</strong>: Route edit dilindungi middleware authorization</li>
        </ul>
    @endauth

    @guest
        <p>Silakan login untuk mengakses fitur ini.</p>
        <a href="{{ url('/acara23/login') }}">Login</a>
    @endguest
</body>
</html>
