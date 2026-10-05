<!DOCTYPE html>
<html>
<head><title>Profile - Acara 23</title></head>
<body>
    <h2>Acara 23 - Prosedur 2: Retrieving The Authenticated User</h2>

    {{-- Menggunakan Auth Facade untuk mendapatkan data pengguna --}}
    <h3>Data Pengguna (Auth::user())</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Field</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>ID (Auth::id())</td>
            <td>{{ $userId }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Role</td>
            <td>{{ $user->role }}</td>
        </tr>
        <tr>
            <td>Dibuat</td>
            <td>{{ $user->created_at }}</td>
        </tr>
    </table>

    {{-- Menggunakan di Blade Template sesuai modul --}}
    <h3>Menggunakan Auth di Blade Template</h3>
    <h1>Welcome, {{ Auth::user()->name }}</h1>

    <br>
    <a href="{{ url('/acara23/dashboard') }}">Kembali ke Dashboard</a>
</body>
</html>
