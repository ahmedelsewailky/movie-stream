<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main categories
        $main_categories = ['movies' => 'افلام', 'series' => 'مسلسلات', 'tvshows' => 'برامج تلفزيونية'];

        foreach ($main_categories as $key => $value) {
            \App\Models\Category::create([
                'name' => $value,
                'slug' => $key
            ]);
        }

        \App\Models\Category::create([
            'name' => 'افلام عربي',
            'slug' => 'arabic-movies',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'افلام اجنبي',
            'slug' => 'foreign-movies',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'افلام هندي',
            'slug' => 'indian-movies',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'افلام آسيوي',
            'slug' => 'asian-movies',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'افلام تركي',
            'slug' => 'turkish-movie',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'افلام كرتون',
            'slug' => 'cartoon-movies',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'افلام كلاسيكية',
            'slug' => 'classic-movies',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'افلام وثائقية',
            'slug' => 'documentary-movies',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات عربية',
            'slug' => 'arabic-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات اجنبيه',
            'slug' => 'foreign-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات هندية',
            'slug' => 'indian-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات كورية',
            'slug' => 'korean-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات آسيوية',
            'slug' => 'asian-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات تركية',
            'slug' => 'turkish-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات كرتون',
            'slug' => 'cartoon-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات كلاسيكية',
            'slug' => 'classic-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'مسلسلات وثائقية',
            'slug' => 'documentary-series',
            'parent_id' => 2
        ]);

        \App\Models\Category::create([
            'name' => 'برامج تلفزيونية',
            'slug' => 'tv-shows',
            'parent_id' => 3
        ]);
    }
}
