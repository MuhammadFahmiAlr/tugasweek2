<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $admin = User::firstOrNew(['email' => 'admin@example.com']);
        $admin->name = 'Admin Fahmi';
        $admin->password = 'password';
        $admin->role = 'admin';
        $admin->save();

        $user = User::firstOrNew(['email' => 'user@example.com']);
        $user->name = 'User Fahmi';
        $user->password = 'password';
        $user->role = 'user';
        $user->save();

        if (User::count() < 10) {
            User::factory()->count(10)->create(); 
        }
    }
}
