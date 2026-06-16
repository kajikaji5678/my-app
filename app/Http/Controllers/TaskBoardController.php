<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Services\BoardService;
use Illuminate\Http\Request;

class TaskBoardController extends Controller
{
    // todo 共通部分をprivateにする
    // todo 5/30 カウント部分を削除してBladeでforeachにする
    // todo 6/1 サービスコンテナに責務を分担する

    private BoardService $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    public function get()
    {
        // todo 5/26/15 $teamsはコレクション（複数件）foreachで配列にしてから指定して取り出す

        // * 条件が2重になったら絞り込めばいいだけだ
        // * ただしビューのほうでさらにステータス絞り込みをしている

        // * リレーションの親子間違えが起きている
        // * 親が先である

        $projectId = 1;
        $tasks = Task::where('project_id', $projectId)->get();
        $data = $this->boardService->getBoardData($projectId, $tasks);
        $users2 = User::pluck('name', 'id');

        return view('toDo.borad', array_merge($data, compact('users2')));
    }

    public function act(Request $request)
    {
        $query = Task::where('project_id', 1);
        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('milestone_id')) {
            $query->where('milestone_id', $request->milestone_id);
        }
        $tasks = $query->get();
        $data = $this->boardService->getBoardData(1, $tasks);

        return view('toDo.borad', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'type_id' => 'required',
            'milestone_id' => 'required',
            'category_id' => 'required',
            'users_ids' => 'required',
        ], [
            'task_name.required' => 'タスク名が入力されていません。',
        ]);

        $task = Task::create([
            'task_name' => $request->task_name,
            'project_id' => 1,
            'type_id' => $request->type_id,
            'milestone_id' => $request->milestone_id,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id,
            'status' => 'aaa',
        ]);


        $task->users()->attach($request->users_ids);

        // * 6/16 クリエイトは登録されたレコードをモデル化して返します

        return redirect()->route('board.form');
    }

    public function update(Request $request)
    {
        $task = Task::findOrFail($request->task_id);
        $task->update([
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('board.form');
    }

    public function api($id)
    {
        $response = Task::with(['category', 'milestone', 'type'])->find($id);

        return response()->json($response);
    }
}
