<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Milestone;
use App\Models\Status;
use App\Models\Type;

class BoardService
{
    public function getBoardData($projectId, $tasks)
    {
        $warningTasks = collect();
        $normalTasks = collect();

        foreach ($tasks as $task) {
            if (($task->real_time - $task->estimated_time) >= 30 && $task->status_id = 2) {
                $warningTasks->push($task);
            } else {
                $normalTasks->push($task);
            }
        }

        return [
            'tasks' => $tasks,
            'warningTasks' => $warningTasks,
            'normalTasks' => $normalTasks,
            'types' => Type::where('projects_id', $projectId)->get(),
            'categories' => Category::where('project_id', $projectId)->get(),
            'milestones' => Milestone::where('project_id', $projectId)->get(),
            'statuses' => Status::where('project_id', $projectId)->get(),
        ];
    }
}
