<!DOCTYPE html>
<html>
<head><title>Edit Post - Acara 24</title></head>
<body>
    <h2>Edit Post - Acara 24 (Authorization)</h2>
    <p><em>Halaman ini hanya bisa diakses oleh pemilik post (Gate & Policy)</em></p>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/acara24/posts/'.$post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Judul:</label><br>
        <input type="text" name="title" value="{{ $post->title }}" required style="width: 300px;"><br>
        <label>Konten:</label><br>
        <textarea name="content" required style="width: 300px; height: 100px;">{{ $post->content }}</textarea><br><br>
        <button type="submit">Update Post</button>
    </form>
    <br>
    <a href="{{ url('/acara24/posts') }}">Kembali ke Daftar Post</a>
</body>
</html>
