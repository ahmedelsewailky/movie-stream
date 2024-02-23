<?php

namespace Database\Factories;

use App\Models\{Actor, Category};
use App\Http\Helpers\DataArray;
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
            'category_id' => Category::all()->random()->id,
            'user_id' => 1,
            'quality' => array_rand(DataArray::QUALITIES),
            'language' => array_rand(DataArray::LANGUAGES),
            'year' => rand(2005,2024),
            'types' => array_keys(DataArray::TYPES),
            'story' => $this->faker->paragraph(5),
            'links' => [
                $this->faker->url,
                $this->faker->url,
            ],
            'actors' => Actor::factory(),
            'watch_link' => $this->faker->url,
            'dubbed_status' => array_rand(DataArray::DUBBED_STATUS),
            'views' => rand(0,85000)
        ];
    }
}
