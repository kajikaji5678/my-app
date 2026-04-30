<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class WorkTimeController extends Controller
{
    public function go() {
        $start = Carbon::now();
        session(['start_time' => $start]);
        return redirect('main')->with('message', '出勤ありがとう');
    }
}
