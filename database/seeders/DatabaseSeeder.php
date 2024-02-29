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
        $this->call([UserSeeder::class, CategorySeeder::class]);

        \App\Models\Actor::factory(15)->create();

        \App\Models\Movie::factory(25)->create();

        \App\Models\Series::factory(15)->create();

        \App\Models\SeriesEpisode::factory(25)->create();

        $this->call([ActorWorksSeeder::class]);
    }

}
