<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin Account
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => 'password', // Password otomatis di-hash oleh model cast
            'role' => 'admin',
        ]);

        // User Account
        User::create([
            'name' => 'Pengguna Biasa',
            'email' => 'user@gmail.com',
            'password' => 'password',
            'role' => 'user',
        ]);
    }
}
