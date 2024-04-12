<?php

namespace Database\Factories;

use App\Http\Helpers\DataArray;
use App\Models\{User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence;

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'category_id' => rand(4,11), // get only movies category form id 4 to id 11
            'user_id' => User::all()->random()->id,
            'quality' => array_rand(DataArray::QUALITIES),
            'language' => fake()->randomElement(DataArray::LANGUAGES),
            'year' => rand(2005,2024),
            'types' => array_keys(DataArray::TYPES),
            'story' => $this->faker->paragraph(5),
            'links' => [
                $this->faker->url,
                $this->faker->url,
            ],
            'watch_link' => $this->faker->url,
            'duration' => $this->faker->time,
            'dubbed_status' => array_rand(DataArray::DUBBED_STATUS),
            'views' => rand(0,85000)
        ];
    }
}
