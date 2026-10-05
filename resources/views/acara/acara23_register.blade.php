<!DOCTYPE html>
<html>
<head><title>Register - Acara 23</title></head>
<body>
    <h2>Register Acara 23</h2>
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/acara23/register') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>Konfirmasi Password:</label><br>
        <input type="password" name="password_confirmation" required><br><br>
        <button type="submit">Register</button>
    </form>
    <br>
    <a href="{{ url('/acara23/login') }}">Sudah punya akun? Login</a>
</body>
</html>
