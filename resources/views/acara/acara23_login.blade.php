<!DOCTYPE html>
<html>
<head><title>Login - Acara 23</title></head>
<body>
    <h2>Login Acara 23 - Authentication Part 2</h2>
    <p><em>Prosedur 1: Redirect User To Specific Page</em></p>

    @if($errors->any())
        <div style="color: red;">{{ $errors->first() }}</div>
    @endif

    <form action="{{ url('/acara23/login') }}" method="POST">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="{{ url('/acara23/register') }}">Belum punya akun? Register</a>
</body>
</html>
