<?php

namespace Database\Seeders;

use App\Http\Helpers\DataArray;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\{SeriesEpisode, Series, User};

class SeriesEpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection = collect([]);

        for ($i = 0; $i < 5; $i++) {
            $collection->push([
                'series_id' => Series::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'episode' => rand(1, 100),
                'watch_link' => fake()->unique()->url,
                'links' => [
                    fake()->url,
                    fake()->url,
                ],
                'quality' => array_rand(DataArray::QUALITIES),
                'views' => rand(500,85000),
            ]);
        }


        foreach ($collection->chunk(5) as $chunk) {
            SeriesEpisode::insert($chunk->toArray());
            // DB::table('series_episodes')->insert($chunk);
        }
    }
}
