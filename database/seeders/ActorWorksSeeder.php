<?php

namespace Database\Seeders;

use App\Models\{Actor, Movie, Series};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = collect([]);

        /**
         * Generate 250 record within movie actor table
         */
        for ($i = 0; $i < 250; $i++) {
            $movies->push([
                'movie_id' => Movie::all()->random()->id,
                'actor_id' => Actor::all()->random()->id,
            ]);
        }

        foreach ($movies->chunk(50)->toArray() as $chunk) {
            DB::table('movie_actor')->insert($chunk);
        }

        /**
         * Generate 250 record within series actor table
         */
        $series = collect([]);
        for ($i = 0; $i < 250; $i++) {
            $series->push([
                'series_id' => Series::all()->random()->id,
                'actor_id' => Actor::all()->random()->id,
            ]);
        }

        foreach ($series->chunk(50)->toArray() as $chunk) {
            DB::table('series_actor')->insert($chunk);
        }
    }
}
