<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\BoardService;

class AsssignController extends Controller
{
    private BoardService $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    public function index()
    {

        $projectId = 1;
        $tasks = Task::where('project_id', $projectId)->get();
        $data = $this->boardService->getBoardData($projectId, $tasks);

        return view('toDo.assign', $data);
    }
}
