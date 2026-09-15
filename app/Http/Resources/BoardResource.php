<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tasks' => TaskResource::collection($this['tasks']),
            'editedTasks' => [
                'super' => collect($this['editedTasks']['super'])->map(fn($tasks) => TaskResource::collection($tasks))->all(),
                'warning' => collect($this['editedTasks']['warning'])->map(fn($tasks) => TaskResource::collection($tasks))->all(),
                'normal' => collect($this['editedTasks']['normal'])->map(fn($tasks) => TaskResource::collection($tasks))->all(),
            ],
            'types' => $this['types'],
            'categories' => $this['categories'],
            'statuses' => $this['statuses'],
            'project' => $this['project'],
        ];
    }
}
