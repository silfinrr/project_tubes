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
            'email' => 'silfinh@gmail.com',
            'password' => 'Passsilfi123',
            'role' => 'admin',
        ]);

        // User Account
        User::create([
            'name' => 'Siti Rahmawati',
            'email' => 'rahma@gmail.com',
            'password' => 'Passrahma123',
            'role' => 'user',
        ]);
    }
}
