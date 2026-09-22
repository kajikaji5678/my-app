<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Task;
use App\Services\MentionService;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct(
        private MentionService $mentionService
    )
    {
    }

    public function index(Task $task)
    {
        $comments = $task->comments()->whereNull('parent_id')->with('user', 'child.user')->latest()->get();
        return CommentResource::collection($comments);
    }

    // このTaskにコメントを新規作成する
    public function store(StoreCommentRequest $request, Task $task)
    {
        $comments = $task->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);

        // メンション保存
        $this->mentionService->sync($comments);
        $comments->load('user');

        return new CommentResource($comments);
    }

    public function update(StoreCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        $this->mentionService->sync($comment);
        $comment->load('user');
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->noContent();
    }

    public function replyCommentStore(StoreCommentRequest $request, Comment $comment)
    {
        $reply = $comment->child()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'commentable_type' => $comment->commentable_type,
            'commentable_id' => $comment->commentable_id
            ]);
        $this->mentionService->sync($reply);
        $reply->load('user');
        return new CommentResource($reply);
    }
}
