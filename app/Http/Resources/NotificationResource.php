<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'commentId' => $this->data['comment_id'] ?? null,
            'message' => $this->data['messsage'] ?? null,
            'readAt' => $this->read_at,
            'createAt' => $this->created_at,
            'task_id' => $this->data['task_id'] ?? null,
        ];
    }
}
