<?php

namespace Database\Seeders;

use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            foreach(['ベータ', 'ローカル', '本番'] as $name) {
                Milestone::create([
                    'milestone_name' => $name,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
