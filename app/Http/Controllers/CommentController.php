<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Task $task)
    {
        $comments = $task->comments()->with('user')->latest()->get();
        return CommentResource::collection($comments);
    }

    // このTaskにコメントを新規作成する
    public function store(StoreCommentRequest $request, Task $task)
    {
        $comments = $task->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);

        $comments->load('user');

        return new CommentResource($comments);
    }

    public function update(StoreCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->noContent();
    }
}
