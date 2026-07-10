<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\BoardService;
use Illuminate\Http\Request;
use App\Services\UserTaskProcessing;

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
        $projectId = 1;
        $tasks = Task::where('project_id', $projectId)->get();
        $data = $this->boardService->getBoardData($projectId, $tasks);

        $warningTask = collect();
        $normalTask = collect();

        foreach ($tasks as $task) {
            if (($task->real_time - $task->estimated_time) >= 30 && $task->status_id = 2) {
                $warningTask->push($task);
            } else {
                $normalTask->push($task);
            }
        }

        return view('toDo.borad', $data);
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
        if ($request->filled('over-time')) {
            $query->whereColumn('estimated_time', '<', 'real_time');
        }
        if ($request->filled('priority')) {
            $query->where('priority', '高');
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
            'category_id' => 'required',
        ], [
            'task_name.required' => 'タスク名が入力されていません。',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'project_id' => 1,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'status_id' => 1, //! マジックナンバーあり注意
            'status' => 'aaa',
            'description' => $request->description,
        ]);

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

    public function api(Task $id)
    {
        return response()->json($id);
    }


    //~ 以下 算出コンテナの利用 6/26
    public function showUserTime($id) {
        $calculation = new UserTaskProcessing();
        $estimated = $calculation->getTotalEstimatedTime($id);
        $real = $calculation->getTotalRealTime($id);
        return view('toDo.borad', compact('estimated', 'real'));
    }

}

