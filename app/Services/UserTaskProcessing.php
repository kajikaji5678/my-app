<?php

namespace App\Services;

use App\Models\Task;

//~ 6/26 計算式クラス作成

class UserTaskProcessing {
    public function getTotalEstimatedTime($userId) {
        return Task::where('responsible_user_id', $userId)->sum('estimated_time');
    }

    public function getTotalRealTime($userId) {
        return Task::where('responsible_user_id', $userId)->sum('real_time');
    }

    //* 差分を出すメゾット
    public function getOverTime($userId) {
        $realTime = $this->getTotalRealTime($userId);
        $estimatedTime = $this->getTotalEstimatedTime($userId);
        return $realTime - $estimatedTime;
    }

    //* 一週間ごとのユーザー一人分の数値を返す
    public function getWeeklyUser($userId) {
        $start = now()->subWeek();

        $tasks = Task::where('responsible_user_id', $userId)
                    ->where('status_id', 4)
                    ->where('completed_at', '>=', $start)
                    ->get();
        
        $estimated = $tasks->sum('estimated_time');
        $real = $tasks->sum('real_time');

        if ($estimated === 0) {
            return 0;
        }

        return round(($real / $estimated) * 100, 1);
    }
}
