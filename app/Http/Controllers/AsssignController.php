<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleLevel;
use App\Models\Task;
use App\Services\BoardService;
use Illuminate\Http\Request;

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
            'assign_data_1' => $validated,
        ]);

        $mode = 4;
        $roles = Role::all();
        $rolelevels = RoleLevel::where('project_id', 1)->get();

        return view('toDo.assign', compact('roles', 'rolelevels', 'mode'));
    }

    public function step2(Request $request) {
        $validated = $request->validate([
            'start_time' => ['required'],
            'end_time' => ['required'],
            'role_id' => ['required'],
            'role_level_id' => ['required'] 
        ], [
            'start_time.required' => '開始時刻が設定されていません。',
            'end_time.required' => '終了時刻が設定されていません。'
        ]);
        dd($data);
    }
}

// * メモ
// コンストラクタは誕生直後に実行される処理

// test