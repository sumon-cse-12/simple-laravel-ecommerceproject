<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'role' => '1',
                'password' => bcrypt('123456'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        \App\Models\User::insert($users);
    }
}