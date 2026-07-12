<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@pos.id',
            'role' => 'admin',
            'password' => bcrypt('password123'),
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@pos.id',
            'role' => 'user',
            'password' => bcrypt('password123'),
        ]);

        User::factory(10)->create([
            'role' => 'user',
            'password' => Hash::make('user123'),
        ]);
    }
}
