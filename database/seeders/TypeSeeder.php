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
            '確認依頼' => '#6A5ACD',
            'バグ修正' => '#FF0000',
            'タスク' => '#EE82EE',
            '要望' => '#E6E6FA'
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
