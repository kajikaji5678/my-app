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
        $edidedTasks = [
            'super' => [],
            'warning' => [],
            'normal' => [],
        ];

        foreach ($tasks as $task) {
            $overTime = $task->real_time - $task->estimated_time;
            if ($overTime >= 60 && $task->status_id == 2) {
                $level = 'super';
            } elseif ($overTime >= 30) {
                $level = 'warning';
            } else {
                $level = 'normal';
            }

            $edidedTasks[$level][$task->status_id][] = $task;
        }


        return [
            'tasks' => $tasks,
            'edidedTasks' => $edidedTasks,
            'types' => Type::where('projects_id', $projectId)->get(),
            'categories' => Category::where('project_id', $projectId)->get(),
            'statuses' => Status::where('project_id', $projectId)->get(),
            'project' => Project::where('id', $projectId)->first(),
        ];
    }
}
