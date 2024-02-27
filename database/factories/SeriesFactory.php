<?php

namespace Database\Factories;

use App\Models\{Actor, Category};
use App\Http\Helpers\DataArray;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class SeriesFactory extends Factory
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
            'year' => rand(2005,2024),
            'language' => array_rand(DataArray::LANGUAGES),
            'types' => array_keys(DataArray::TYPES),
            'story' => $this->faker->paragraph(5),
            'dubbed_status' => array_rand(DataArray::DUBBED_STATUS),
        ];
    }
}
