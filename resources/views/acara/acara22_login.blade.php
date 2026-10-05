<!DOCTYPE html>
<html>
<head><title>Login - Acara 22</title></head>
<body>
    <h2>Login Acara 22</h2>
    @if($errors->any())
        <div style="color: red;">{{ $errors->first() }}</div>
    @endif
    <form action="{{ url('/acara22/login') }}" method="POST">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="{{ url('/acara22/register') }}">Belum punya akun? Register</a>
</body>
</html>
