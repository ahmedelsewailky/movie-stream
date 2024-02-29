<?php

namespace Database\Factories;

use App\Http\Helpers\DataArray;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class TvshowFactory extends Factory
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
            'year' => rand(2005,2024),
            'language' => $this->faker->randomElement(DataArray::LANGUAGES),
            'story' => $this->faker->paragraph(5),
        ];
    }
}
