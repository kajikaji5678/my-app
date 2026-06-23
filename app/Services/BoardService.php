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

        return [
            'tasks' => $tasks,
            'warningTasks' => $warningTasks,
            'normalTasks' => $normalTasks,
            'superWarningTasks' => $superWarningTasks,
            'types' => Type::where('projects_id', $projectId)->get(),
            'categories' => Category::where('project_id', $projectId)->get(),
            'milestones' => Milestone::where('project_id', $projectId)->get(),
            'statuses' => Status::where('project_id', $projectId)->get(),
        ];
    }
}
