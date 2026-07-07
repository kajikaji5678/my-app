<?php

namespace App\Services;
use App\Models\Task;

// ~ 6/26 計算式クラス作成

class UserTaskProcessing
{
    public function getTotalEstimatedTime($userId)
    {
        return Task::where('responsible_user_id', $userId)->sum('estimated_time');
    }

    public function getTotalRealTime($userId)
    {
        return Task::where('responsible_user_id', $userId)->sum('real_time');
    }

    // * 差分を出すメゾット
    public function getOverTime($userId)
    {
        $realTime = $this->getTotalRealTime($userId);
        $estimatedTime = $this->getTotalEstimatedTime($userId);

        return $realTime - $estimatedTime;
    }

    // * 一週間ごとのユーザー一人分の数値を返す
    public function getWeeklyUser($userId, $start, $end)
    {
        $start = now()->subWeek();

        $tasks = Task::where('responsible_user_id', $userId)
            ->where('status_id', 4)
            ->whereBetween('completed_at', [$start, $end])
            ->get();

        $estimated = $tasks->sum('estimated_time');
        $real = $tasks->sum('real_time');

        if ($estimated === 0) {
            return 0;
        }

        return round(($real / $estimated) * 100, 1);
    }

    public function planeWorkTime(): array
    {
        return [
            'estimated' => Task::where('schedule', '予定工数タスク')->sum('estimated_time'),
            'add_estimated' => Task::where('schedule', '追加工数タスク')->sum('estimated_time'),
            'real' => Task::sum('real_time'),
        ];
    }

    public function timeByTask($start, $end) {
        $array = [];
        for($i = $start; $i <= $end; $i++) {
            $count = Task::where('type_id', $i)->sum('real_time');
            array_push($array, $count);
        }
        return $array;
    }
}
