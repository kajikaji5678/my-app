<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Project;
use App\Models\Status;
use App\Models\Type;

class BoardService
{
    public function getBoardData($projectId, $tasks)
    {
        $superWarningTasks = collect();
        $warningTasks = collect();
        $normalTasks = collect();

        foreach ($tasks as $task) {
            $overTime = $task->real_time - $task->estimated_time;
            if ($overTime >= 60 && $task->status_id == 2) {
                $superWarningTasks->push($task);
            } elseif ($overTime >= 30) {
                $warningTasks->push($task);
            } else {
                $normalTasks->push($task);
            }
        }

        $superWarningByStatus = $superWarningTasks->groupBy('status_id');
        $WarningByStatus = $superWarningTasks->groupBy('status_id');
        $normalByStatus = $superWarningTasks->groupBy('status_id');

        return [
            'warningTasks' => $WarningByStatus,
            'normalTasks' => $normalByStatus,
            'superWarningTasks' => $superWarningByStatus,
            'types' => Type::where('projects_id', $projectId)->get(),
            'categories' => Category::where('project_id', $projectId)->get(),
            'statuses' => Status::where('project_id', $projectId)->get(),
            'project' => Project::where('id', $projectId)->first(),
        ];
    }
}
