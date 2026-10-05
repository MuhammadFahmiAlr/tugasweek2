<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Acara23AuthController extends Controller
{
    // ============================================================
    // 1. Redirect User To Specific Page
    // ============================================================
    // Setelah login, pengguna diarahkan ke halaman tertentu

    public function showLogin()
    {
        return view('acara.acara23_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirect ke halaman dashboard (specific page)
            return redirect()->intended('/acara23/dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // ============================================================
    // 2. Retrieving The Authenticated User
    // ============================================================
    // Menggunakan Auth Facade untuk mendapatkan data pengguna

    public function showProfile()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $userId = Auth::id(); // Mengambil ID Pengguna
        return view('acara.acara23_profile', compact('user', 'userId'));
    }

    // ============================================================
    // 3. Recreating Logout Feature
    // ============================================================
    // Menggunakan Auth Facade untuk logout

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        $request->session()->invalidate(); // Hapus sesi
        $request->session()->regenerateToken();
        // Regenerasi CSRF token

        return redirect('/acara23/login'); // Redirect ke halaman login
    }

    // ============================================================
    // 4. Protecting Routes - Dashboard (dilindungi middleware auth)
    // ============================================================

    public function dashboard()
    {
        return view('acara.acara23_dashboard');
    }

    public function showRegister()
    {
        return view('acara.acara23_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ]);

        Auth::login($user);

        // Redirect ke specific page setelah register
        return redirect('/acara23/dashboard');
    }
}
