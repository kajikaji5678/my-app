<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\start_and_end_time;

class WorkTimeController extends Controller
{
    public function go() {
        $start = Carbon::now();
        session(['start_time' => $start]);
        return redirect('main')->with('message', '出勤ありがとう');
    }

    public function end() {
        $end = Carbon::now();
        session(['end_time' => $end]);
        return redirect('main');
    }
}
