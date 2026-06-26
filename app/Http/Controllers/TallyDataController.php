<?php

namespace App\Http\Controllers;

use App\Services\UserTaskProcessing;

class TallyDataController extends Controller
{
    // ~ 以下 算出コンテナの利用 6/26
    public function showUserTime($id)
    {
        $calculation = new UserTaskProcessing;
        $estimated = $calculation->getTotalEstimatedTime($id);
        $real = $calculation->getTotalRealTime($id);

        return view('toDo.borad', compact('estimated', 'real'));
    }
}
