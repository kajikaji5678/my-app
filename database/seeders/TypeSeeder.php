<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            '確認依頼' => '#4169e1',
            'バグ修正' => '#ff4500',
            'タスク' => '#00ff7f',
            '要望' => '#ffd700'
        ];

        $projects = Project::all();

        foreach ($projects as $project) {
            foreach ($types as $typeName => $typeColor) {
                Type::create([
                    'type_name' => $typeName,
                    'type_color' => $typeColor,
                    'projects_id' => $project->id
                ]);
            }
        }
    }
}
