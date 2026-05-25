<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'フロントエンド',
            'デザイン',
            'バックエンド'
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category,
                'project_id' => Project::inRandomOrder()->first()->id
            ]);
        }
    }
}
