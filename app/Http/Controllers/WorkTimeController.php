<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\StartAndEndTime;

class WorkTimeController extends Controller
{
    public function go() {
        $start = new StartAndEndTime();
        $start->start_time = now();
        $start->save();
        return redirect('main')->with('message', '出勤ありがとう');
    }

    public function end() {
        $end = StartAndEndTime::latest()->first();

        if ($end) {
            $end->end_time = Carbon::now();
            $end->save();
        }
        return redirect('main');
    }

    public function get() {
        $works = StartAndEndTime::latest()->get();
        foreach ($works as $work) {
            $start = Carbon::parse($work->start_time);
            $end = Carbon::parse($work->end_time);

            $min = floor($start->diffInSeconds($end) / 60);
            $hourly = 1000;

            $work->salaly = floor(($min / 60) * $hourly);
            $work->min = $min;
        }

        return view('list', compact('works'));
    }
}
