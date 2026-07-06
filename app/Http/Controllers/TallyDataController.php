<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\BoardService;
use App\Services\UserTaskProcessing;
use Illuminate\Http\Request as HttpRequest;
use App\Models\Task;
use Request;

class TallyDataController extends Controller
{
    public function __construct(
        private UserTaskProcessing $calculation
    ) {}

    // ~ 以下 算出コンテナの利用 6/26
    public function index()
    {
        $boardService = new BoardService();

        $projectId = 1;
        $tasks = Task::where('project_id', $projectId)->get();

        $data = $boardService->getBoardData($projectId, $tasks);


        $users = User::all();
        $start = now()->startOfWeek();
        $end = now()->endOfWeek();

        $ranking = [];
        foreach ($users as $user) {
            $ranking[] = [
                'name' => $user->name,
                'rate' => $this->calculation->getWeeklyUser($user->id, $start, $end),
            ];
        }

        $planeCalcuration = $this->calculation->planeWorkTime();
        $planeEstimatedSum = $planeCalcuration['estimated'];
        $planeRealSum = $planeCalcuration['real'];
        $planeAddEstimatedSum = $planeCalcuration['add_estimated'];

        $sortedRanking = collect($ranking)->sortByDesc('rate')->take(10)->values();
        $timeByTask = $this->calculation->timeByTask(1, 4);

        return view('toDo.graph', compact('sortedRanking', 'data', 'planeEstimatedSum', 'planeRealSum', 'timeByTask', 'planeAddEstimatedSum'));
    }

    public function week()
    {
        $users = User::all();
        $period = request('period', 'this_week');

        switch ($period) {
            case 'last_week':
                $start = now()->subWeek()->startOfWeek();
                $end = now()->subWeek()->endOfWeek();
                break;

            case 'this_month':
                $start = now()->startOfMonth();
                $end = now()->endOfMonth();
                break;

            default:
                $start = now()->startOfWeek();
                $end = now()->endOfWeek();
        }

        $ranking = [];
        foreach ($users as $user) {
            $ranking[] = [
                'name' => $user->name,
                'rate' => $this->calculation->getWeeklyUser($user->id, $start, $end),
            ];
        }

        $sortedRanking = collect($ranking)->sortByDesc('rate')->take(10)->values();

        return view('toDo.graph', compact('sortedRanking'));
    }


    public function test(HttpRequest $request)
    {
        $id = $request->user_id;
        $estimated = $this->calculation->getTotalEstimatedTime($id);
        $real = $this->calculation->getTotalRealTime($id);

        return view('toDo.graph', compact('estimated', 'real'));
    }
}
