<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserTaskProcessing;
use Illuminate\Http\Request as HttpRequest;
use Request;

class TallyDataController extends Controller
{
    // ~ 以下 算出コンテナの利用 6/26
    public function index() {
        $users = User::all();
        $calculation = new UserTaskProcessing();

        $ranking = [];
        foreach ($users as $user) {
            $ranking[] = [
                'name' => $user->name,
                'rate' => $calculation->getWeeklyUser($user->id),
            ];
        }

        $sortedRanking = collect($ranking)->sortByDesc('rate');

        return view('toDo.graph', compact('sortedRanking'));
    }


    public function test(HttpRequest $request)
    {
        $id = $request->user_id;
        $calculation = new UserTaskProcessing;
        $estimated = $calculation->getTotalEstimatedTime($id);
        $real = $calculation->getTotalRealTime($id);

        return view('toDo.graph', compact('estimated', 'real'));
    }
}
