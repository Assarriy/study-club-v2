<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Matematika', 'color_theme' => '#FBBF24', 'description' => 'Klub logika.'],
            ['name' => 'Kimia', 'color_theme' => '#1E3A8A', 'description' => 'Klub reaksi.'],
        ];

        foreach ($categories as $cat) {
            Category::create(['name' => $cat['name'], 'slug' => Str::slug($cat['name']), 'color_theme' => $cat['color_theme'], 'description' => $cat['description']]);
        }
    }
}
