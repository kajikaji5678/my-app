<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;

class TaskBoardController extends Controller
{
    public function get() {
        // todo 5/26/15 $teamsはコレクション（複数件）foreachで配列にしてから指定して取り出す
        //* ただ多分もっといい方法もあると思う
        //  $teams = Task::with('type')->get() ;
        // $array = [];
        // foreach ($teams as $team) {
        //     array_push($array, $team);
        // }
        // dd($array[1]->type->type_name);

        $tasks = Task::where('project_id', 1)->get();
        $toDoCount = Task::where('project_id', 1)->where('status', '未対応')->count();
        $doingCount = Task::where('project_id', 1)->where('status', '処理中')->count();
        $doneCount = Task::where('project_id', 1)->where('status', '処理済み')->count();
        $completeCount = Task::where('project_id', 1)->where('status', '完了')->count();
        return view('toDo.borad', compact('tasks', 'toDoCount', 'doingCount', 'doneCount', 'completeCount'));
    }
}
