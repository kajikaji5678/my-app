<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Task;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Task $task)
    {
        $comments = $task->comments()->with('user')->latest()->get();
        return CommentResource::collection($comments);
    }

    public function store(StoreCommentRequest $request, Task $task) {
        $comments = $task->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);

        $comments->load('user');

        return new CommentResource($comments);
    }
}
