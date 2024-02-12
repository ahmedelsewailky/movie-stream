<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main categories
        $tags = [
            'comedy' => 'كوميدي',
            'drama' => 'دراما',
            'action' => 'اكشن',
            'terror' => 'رعب',
            'historical' => 'تاريخي',
            'fiction' => 'خيال علمي',
            'adventure' => 'مغامرة',
        ];

        foreach ($tags as $key => $value) {
            \App\Models\Tag::create([
                'name' => $value,
                'slug' => $key
            ]);
        }
    }
}
