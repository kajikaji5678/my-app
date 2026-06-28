<?php

namespace App\Http\Controllers;

use App\Services\UserTaskProcessing;
use Illuminate\Http\Request as HttpRequest;
use Request;

class TallyDataController extends Controller
{
    // ~ 以下 算出コンテナの利用 6/26
    public function test(HttpRequest $request)
    {
        $id = $request->user_id;
        $calculation = new UserTaskProcessing;
        $estimated = $calculation->getTotalEstimatedTime($id);
        $real = $calculation->getTotalRealTime($id);

        return view('toDo.graph', compact('estimated', 'real'));
    }
}
