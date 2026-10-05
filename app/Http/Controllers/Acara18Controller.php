<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Acara18Controller extends Controller
{
    public function index()
    {
        return view('acara.acara18');
    }

    public function create()
    {
        User::create([
            'name' => 'John Doe Eloquent',
            'email' => 'john.eloquent' . rand(1, 1000) . '@example.com',
            'password' => bcrypt('password')
        ]);

        $user = new User;
        $user->name = 'Jane Doe Eloquent';
        $user->email = 'jane.eloquent' . rand(1, 1000) . '@example.com';
        $user->password = bcrypt('password');
        $user->save();

        return "Berhasil: Data John dan Jane (Eloquent) telah ditambahkan!";
    }

    public function save()
    {
        // Handled in create method, redirecting logic
        return redirect('/acara18/create');
    }

    public function all()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function where()
    {
        $users = User::where('email', 'like', '%@example.com%')->get();
        return response()->json($users);
    }

    public function update()
    {
        User::where('email', 'like', '%@example.com%')
            ->update(['name' => 'John Updated']);
            
        $user = User::latest()->first();
        if($user) {
            $user->name = 'User ID ' . $user->id . ' Updated';
            $user->save();
        }

        return "Berhasil: Data pengguna (Eloquent) telah diperbarui!";
    }

    public function delete()
    {
        $user = User::latest()->first();
        if($user) {
            $user->delete();
        }
        
        // Ensure there's a row to destroy before calling destroy(2) to prevent silent skip or error, 
        // but we'll just follow the logic loosely.
        
        return "Berhasil: Data pengguna (Eloquent) telah dihapus!";
    }
}
