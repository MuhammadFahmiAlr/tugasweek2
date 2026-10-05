<!DOCTYPE html>
<html>
<head><title>Dashboard - Acara 23</title></head>
<body>
    <h2>Dashboard Acara 23 - Authentication Part 2</h2>

    {{-- Prosedur 4c: Melindungi Konten di Blade --}}
    {{-- Menggunakan directive @auth dan @guest --}}

    @auth
        <p>Selamat datang, {{ Auth::user()->name }}</p>
        <p>Role: {{ Auth::user()->role }}</p>

        <h3>Menu:</h3>
        <ul>
            <li><a href="{{ url('/acara23/profile') }}">Lihat Profile (Prosedur 2)</a></li>
            <li><a href="{{ url('/acara24/posts') }}">Posts - Authorization (Acara 24)</a></li>
        </ul>

        {{-- Prosedur 3c: Tombol Logout di Blade --}}
        <form action="{{ route('acara23.logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth

    @guest
        <p>Silakan login untuk mengakses fitur ini.</p>
        <a href="{{ url('/acara23/login') }}">Login</a>
    @endguest
</body>
</html>
