<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleLevel;
use App\Models\Task;
use App\Services\BoardService;
use Request;

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

    public function step1(Request $request) {
        $validated = $request->validate([
            'assign_name' => ['required'],
            'assign_content' => ['required'],
            'type_id' => ['required'],
            'category_id' => ['required'],
            'milestone_id' => ['required']
        ], [
            'assign_name.required' => 'アサイン名が入力されていません。',
            'assign_content.required' => '内容が入力されていません。'
        ]);

        session([
            'assign_draft' => $validated,
        ]);

        $roles = Role::all();
        $role_levels = RoleLevel::where('project_id', 1)->get();

        return view('toDo.assign', compact('roles', 'role_levels'));
    }
}

// * メモ
// コンストラクタは誕生直後に実行される処理
