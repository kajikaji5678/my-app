<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'estimated_time' => $this->estimated_time,
            'real_time' => $this->real_time,
            'status_id' => $this->status_id,
            'category_id' => $this->category_id,
            'type_id' => $this->type_id,
            'type' => $this->type,
            'task_name' => $this->task_name,
            'created_at' => $this->created_at,
            'category' => $this->category,
            'status' => $this->status,
            'deadline_at' => $this->deadline_at,
            'priority' => $this->priority,
            'responsible_user_id' => $this->responsible_user_id,
            'responsible_user_name' => $this->responsibleUser?->name,
            'schedule' => $this->schedule,
        ];
    }
}
