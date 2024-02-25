<?php

namespace Database\Seeders;

use App\Http\Helpers\DataArray;
use App\Models\{Episode, Series, User};
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection = collect([]);

        for ($i = 0; $i < 500; $i++) {
            $collection->push([
                'series_id' => Series::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'episode' => rand(1, 100),
                'watch_link' => fake()->unique()->url,
                'links' => 'https://www.google.com',
                'quality' => array_rand(DataArray::QUALITIES),
                'views' => rand(500,85000),
            ]);
        }

        foreach ($collection->chunk(50)->toArray() as $chunk) {
            Episode::insert($chunk);
        }
    }
}
