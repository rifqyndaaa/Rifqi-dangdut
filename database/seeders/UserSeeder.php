<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ... (Faker initialization and other setup)

        // --- Perubahan Ada Di Sini: Cek apakah user admin sudah ada ---
        $adminEmail = 'admin@example.com';

        if (!User::where('email', $adminEmail)->exists()) {
             // Buat 1 admin default HANYA JIKA email tersebut belum ada
            User::create([
                'name' => 'Administrator',
                'email' => $adminEmail,
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'status' => 'active',
            ]);
        }
        // -------------------------------------------------------------------

        // Buat 1000 user lainnya (kode batch insert yang sudah kita optimasi sebelumnya)
        // ... (Kode loop untuk 1000 user lainnya)
    }
}
