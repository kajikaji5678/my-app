<?php

namespace App\Http\Controllers;

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
}
