<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin Utama',
            'email'    => 'admin@gmail.com', // Email untuk login admin
            'password' => Hash::make('password123'), // Password untuk login admin
            // Jika Anda menggunakan kolom role di database, tambahkan baris berikut:
            // 'role'  => 'admin',
        ]);
    }
}