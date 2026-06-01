<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Type;
use App\Models\Milestone;
use App\Models\Status;

class BoardService
{
    public function getBoardData($projectId, $tasks)
    {
        return [
            'tasks' => $tasks,
            'types' => Type::where('projects_id', $projectId)->get(),
            'categories' => Category::where('project_id', $projectId)->get(),
            'milestones' => Milestone::where('project_id', $projectId)->get(),
            'statuses' => Status::where('project_id', $projectId)->get(),
        ];
    }
}
