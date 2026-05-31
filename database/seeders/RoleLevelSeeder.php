<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\RoleLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            '見習い',
            'ジュニア',
            'ミドル',
            'シニア'
        ];
        $projects = Project::all();

        foreach ($projects as $project) {
            foreach ($levels as $level) {
                RoleLevel::create([
                    'role_level' => $level,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
