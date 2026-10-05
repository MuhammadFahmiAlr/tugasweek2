<!DOCTYPE html>
<html>
<head><title>Dashboard - Acara 22</title></head>
<body>
    <h2>Dashboard Acara 22</h2>
    @auth
        <p>Selamat datang, {{ Auth::user()->name }}</p>
        <form action="{{ url('/acara22/logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth
    @guest
        <p>Silakan login untuk mengakses fitur ini.</p>
        <a href="{{ url('/acara22/login') }}">Login</a>
    @endguest
</body>
</html>
