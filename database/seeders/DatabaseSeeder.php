<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🔹 Buat akun admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // ubah nanti
            'role' => 'admin', // pastikan kolom role sudah ada di migration
        ]);

        // 🔹 Buat akun user biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // 🔹 (Opsional) panggil seeder lain, misal ItemsTableSeeder
        $this->call(ItemsTableSeeder::class);
    }
}
