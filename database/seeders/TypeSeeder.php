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
            '確認依頼',
            'バグ修正',
            'タスク',
            '要望'
        ];

        $projects = Project::all();

        foreach ($projects as $project) {
            foreach ($types as $type) {
                Type::create([
                    'type_name' => $type,
                    'projects_id' => $project->id
                ]);
            }
        }
    }
}
