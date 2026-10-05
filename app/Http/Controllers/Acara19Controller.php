<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Acara19Controller extends Controller
{
    public function index()
    {
        return view('acara.acara19');
    }

    public function where()
    {
        $users = User::whereBetween('id', [1, 10])->get();
        return response()->json($users);
    }

    public function relasi()
    {
        $user = User::with(['profile', 'posts', 'roles'])->first();
        
        if ($user) {
            return response()->json($user);
        }
        return "User dengan id 1 tidak ditemukan. Silakan pastikan ID 1 ada di tabel users.";
    }

    public function accessorMutator()
    {
        $user = User::first();
        if ($user) {
            $user->password = 'password123';
            return "Berhasil: Data dengan Accessor (FullName: " . $user->full_name . ") dan Mutator telah diproses!";
        }
        return "Data tidak ditemukan.";
    }

    public function softDelete()
    {
        $user = User::latest()->first();
        if ($user) {
            $user->delete();
        }
        
        $users = User::all();
        return response()->json($users);
    }

    public function trash()
    {
        $users = User::withTrashed()->get();
        return response()->json($users);
    }

    public function restore()
    {
        $user = User::onlyTrashed()->first();
        if ($user) {
            $user->restore();
            return "Berhasil: Data telah di-restore!";
        }
        return "Tidak ada data yang bisa di-restore.";
    }

    public function scope()
    {
        $activeUsers = User::active()->get();
        return response()->json($activeUsers);
    }
}
