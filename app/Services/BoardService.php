<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Project;
use App\Models\Status;
use App\Models\Type;

class BoardService
{

    public function classifyTask($task)
    {
        $overTime = $task->real_time - $task->estimated_time;

        if ($overTime >= 60 && $task->status_id == 2) {
            return 'super';
        } elseif ($overTime >= 30) {
            return 'warning';
        } else {
            return 'normal';
        }
    }

    public function getBoardData($projectId, $tasks)
    {
        $editedTasks = [
            'super' => [],
            'warning' => [],
            'normal' => [],
        ];

        foreach ($tasks as $task) {
            $level = $this->classifyTask($task);
            $editedTasks[$level][$task->status_id][] = $task;
        }

        return [
            'tasks' => $tasks,
            'editedTasks' => $editedTasks,
            'types' => Type::where('projects_id', $projectId)->get(),
            'categories' => Category::where('project_id', $projectId)->get(),
            'statuses' => Status::where('project_id', $projectId)->get(),
            'project' => Project::where('id', $projectId)->first(),
        ];
    }
}
