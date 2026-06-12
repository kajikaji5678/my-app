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
            '未対応' => '#ff7f50',
            '処理中' => '#ffa500',
            '処理済み' => '#adff2f',
            '完了' => '#7fffd4'
        ];

        $projects = Project::all();

        foreach($projects as $project) {
            foreach($statuses as $statusName => $statusColor) {
                Status::create([
                    'status_name' => $statusName,
                    'status_color' => $statusColor,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
