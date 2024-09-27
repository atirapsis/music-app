<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jason',
            'email' => 'jason@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Ryan',
            'email' => 'ryan@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Mary',
            'email' => 'mary@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Riley',
            'email' => 'riley@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
