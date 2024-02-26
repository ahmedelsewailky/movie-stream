<?php

namespace Database\Seeders;

use App\Models\{Actor, Movie};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection = collect([]);

        for ($i = 0; $i < 250; $i++) {
            $collection->push([
                'movie_id' => Movie::all()->random()->id,
                'actor_id' => Actor::all()->random()->id,
            ]);
        }

        foreach ($collection->chunk(50)->toArray() as $chunk) {
            DB::table('movie_actor')->insert($chunk);
        }
    }
}
