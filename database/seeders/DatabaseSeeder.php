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
        \App\Models\Actor::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
        ]);
    }
}
