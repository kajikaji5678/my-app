<?php

namespace App\Services;

use App\Models\Task;

class UserTaskProcessing {
    public function getTotalEstimatedTime($userId) {
        return Task::where('responsible_user_id', $userId)->sum('estimated_time');
    }

    public function getTotalRealTime($userId) {
        return Task::where('responsible_user_id', $userId)->sum('real_time');
    }
}
