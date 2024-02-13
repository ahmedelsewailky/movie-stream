<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'احمد السويلكي',
            'username' => 'admin',
            'email' => 'admin@yahoo.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'remember_token' => str()->random(10),
        ]);
    }
}
