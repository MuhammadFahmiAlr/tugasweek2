<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Acara17Controller extends Controller
{
    public function index()
    {
        return view('acara.acara17');
    }

    public function insert()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe' . rand(1, 1000) . '@example.com',
            'password' => bcrypt('password123')
        ]);
        
        return "Berhasil: Data pengguna baru telah ditambahkan!";
    }

    public function select()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    public function where()
    {
        $users = DB::table('users')
                    ->where('status', 'active')
                    ->get();
        return response()->json($users);
    }

    public function update()
    {
        DB::table('users')
            ->where('email', 'like', '%@example.com%')
            ->update(['name' => 'John Doe Inactive']);
            
        return "Berhasil: Data pengguna telah diperbarui!";
    }

    public function delete()
    {
        DB::table('users')
            ->where('name', 'John Doe Inactive')
            ->delete();
            
        return "Berhasil: Data pengguna telah dihapus!";
    }

    public function join()
    {
        $users = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.name', 'orders.total_price')
            ->get();
            
        return response()->json($users);
    }

    public function agregat()
    {
        $totalUsers = DB::table('users')->count();
        
        return "Total pengguna di tabel users: " . $totalUsers;
    }
}
