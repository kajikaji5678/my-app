<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // 時間設計クラスを使用
use App\Models\StartAndEndTime;
use Illuminate\Support\Facades\Auth; // 認証機能クラスを使用

class WorkTimeController extends Controller
{
    public function go() {
        // 同日に出勤しているかチェックする
        $todayWork = StartAndEndTime::where('user_id', '=', Auth::id())->whereDate('start_time', '=', now()->toDateString())->exists();
        if ($todayWork) {
            return redirect('main')->with('error', '今日はすでに出勤済みです');
        }

        $start = new StartAndEndTime();
        $start->start_time = now();
        $start->user_id = Auth::id(); // その人のidをぶち込む
        $start->save();
        return redirect('main')->with('message', '出勤ありがとう');
    }

    public function end() {
        $work = Auth::user()->works()->latest()->first(); 
        // ログインユーザーの勤怠一覧を新しい順に並べて一件取得

        if ($work && !$work->end_time) {
            $work->end_time = Carbon::now();
            $start = Carbon::parse($work->start_time);
            $end = Carbon::parse($work->end_time);
            $min = $start->diffInMinutes($end);
            $hourly = Auth::user()->hourly_wage;
            $saraly = floor(($min / 60) * $hourly);

            $work->salaly_sum = $saraly;
            $work->save();
        }
        return redirect('main');
    }

}
