<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Task;

class TaskCreateService
{
    public function create(Project $project, array $data): Task
    {
        return Task::create([
            'task_name' => $data['task_name'],
            'status' => 'null',
            'project_id' => $project->id,
            'category_id' => $data['category_id'] ?? null,
            'type_id' => $data['type_id'] ?? null,
            'status_id' => $data['status_id'],
            'real_time' => $data['real_time'] ?? null,
            'estimated_time' => $data['estimated_time'] ?? null,
            'priority' => $data['priority'] ?? null,
            'schedule' => $data['schedule'] ?? null,
            'responsible_user_id' => $data['responsible_user_id'] ?? null,
            'added_at' => now(),
            'deadline_at' => $data['deadline_at'] ?? null,
            'completed_at' => null,
        ]);
    }
}
