<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Milestone;
use App\Models\Status;
use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;

class TaskBoardController extends Controller
{
    // todo 共通部分をprivateにする
    private function getBoardDate($tasks)
    {
        return [
            'tasks' => $tasks,
            'toDoCount' => $tasks->where('status_id', 1)->count(),
            'doingCount' => $tasks->where('status_id', 2)->count(),
            'doneCount' => $tasks->where('status_id', 3)->count(),
            'completeCount' => $tasks->where('status_id', 4)->count(),
            'types' => Type::where('projects_id', 1)->get(),
            'categories' => Category::where('project_id', 1)->get(),
            'milestones' => Milestone::where('project_id', 1)->get(),
            'statuses' => Status::where('project_id', 1)->get(),
        ];
    }

    public function get()
    {
        // todo 5/26/15 $teamsはコレクション（複数件）foreachで配列にしてから指定して取り出す
        //  $teams = Task::with('type')->get() ;
        // $array = [];
        // foreach ($teams as $team) {
        //     array_push($array, $team);
        // }
        // dd($array[1]->type->type_name);
        // * ただ多分もっといい方法もあると思う

        // * 条件が2重になったら絞り込めばいいだけだ
        // * ただしビューのほうでさらにステータス絞り込みをしている

        // * リレーションの親子間違えが起きている
        // * 親が先である
        $tasks = Task::where('project_id', 1)->get();

        return view('toDo.borad', $this->getBoardDate($tasks));
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

        return view('toDo.borad', $this->getBoardDate($tasks));
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type_id' => 'required',
            'milestone_id' => 'required',
            'category_id' => 'required',
        ], [
            'title.required' => 'タスク名が入力されていません。'
        ]);

        Task::create([
            'task_name' => $request->title,
            'project_id' => 1,
            'type_id' => $request->type_id,
            'milestone_id' => $request->milestone_id,
            'category_id' => $request->category_id,
            'status_id' => 1,
            'status_color' => 'red',
            'status' => 'aaa'
        ]);

        return redirect()->route('board.form');
    }
}
