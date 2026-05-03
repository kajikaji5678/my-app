<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\StartAndEndTime;
use Illuminate\Support\Facades\Auth; // 認証機能クラスを使用

class WorkTimeController extends Controller
{
    public function go() {
        $start = new StartAndEndTime();
        $start->start_time = now();
        $start->user_id = Auth::id(); // その人のidをぶち込む
        $start->save();
        return redirect('main')->with('message', '出勤ありがとう');
    }

    public function end() {
        $end = Auth::user()->works()->latest()->first(); 
        // ログインユーザーの勤怠一覧を新しい順に並べて一件取得

        if ($end) {
            $end->end_time = Carbon::now(); // end_timeはnullなんで追加
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
