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
        $names = [
            'ベータバージョン',
            'ローカル',
            '本番'
        ];

        foreach ($names as $name) {
            Milestone::create([
                'milestone_name' => $name,
                'project_id' => Project::inRandomOrder()->first()->id
            ]);
        }
    }
}
