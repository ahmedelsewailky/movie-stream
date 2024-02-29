<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Series;
use App\Http\Helpers\DataArray;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeriesEpisode>
 */
class SeriesEpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'series_id' => Series::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'episode' => rand(1, 100),
            'watch_link' => $this->faker->unique()->url,
            'links' => [
                $this->faker->url,
                $this->faker->url,
            ],
            'quality' => array_rand(DataArray::QUALITIES),
            'views' => rand(500,85000),
        ];
    }
}
