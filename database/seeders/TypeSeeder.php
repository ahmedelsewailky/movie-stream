<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main categories
        $types = [
            'comedy' => 'كوميدي',
            'drama' => 'دراما',
            'action' => 'اكشن',
            'suspense' => 'اثارة وتشويق',
            'terror' => 'رعب',
            'documentary' => 'وثائقي',
            'fiction' => 'خيال علمي',
            'adventure' => 'مغامرة',
        ];

        foreach ($types as $key => $value) {
            \App\Models\Type::create([
                'name' => $value,
                'slug' => $key
            ]);
        }
    }
}
