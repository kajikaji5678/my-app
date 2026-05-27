<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Models\Category;
use App\Models\Milestone;
use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Project;

class TaskBoardController extends Controller
{
    public function get() {
        // todo 5/26/15 $teamsはコレクション（複数件）foreachで配列にしてから指定して取り出す
        //  $teams = Task::with('type')->get() ;
        // $array = [];
        // foreach ($teams as $team) {
        //     array_push($array, $team);
        // }
        // dd($array[1]->type->type_name);
        //* ただ多分もっといい方法もあると思う

        //* 条件が2重になったら絞り込めばいいだけだ
        //* ただしビューのほうでさらにステータス絞り込みをしている

        //* リレーションの親子間違えが起きている
        //* 親が先である
        $tasks = Task::where('project_id', 1)->get();
        $toDoCount = $tasks->where('status', '未対応')->count();
        $doingCount = $tasks->where('status', '処理中')->count();
        $doneCount = $tasks->where('status', '処理済み')->count();
        $completeCount = $tasks->where('status', '完了')->count();
        $types = Type::where('projects_id', 1)->get();
        $categories = Category::where('project_id', 1)->get();
        $milestones = Milestone::where('project_id', 1)->get();
        return view('toDo.borad', 
        compact('tasks', 'toDoCount', 'doingCount', 'doneCount', 'completeCount', 'types', 'categories', 'milestones'));
    }

    public function act() {
        dd("やあ");
    }
}
