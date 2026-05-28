<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            '未対応',
            '処理中',
            '処理済み',
            '完了'
        ];

        $projects = Project::all();

        foreach($projects as $project) {
            foreach($statuses as $status) {
                Status::create([
                    'status_name' => $status,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
