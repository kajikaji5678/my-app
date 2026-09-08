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
        ];
    }
}
