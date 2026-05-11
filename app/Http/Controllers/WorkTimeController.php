<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // 時間設計クラスを使用
use App\Models\StartAndEndTime;
use Illuminate\Support\Facades\Auth; // 認証機能クラスを使用

class WorkTimeController extends Controller
{

    public function index() {
        $working = StartAndEndTime::where('user_id', Auth::id())
            ->where('status', 1)
            ->whereNull('end_time')
            ->exists();

        return view('main', compact('working'));
    }

    public function go()
    {
        // 同日に出勤しているかチェックする
        $todayWork = StartAndEndTime::where('user_id', Auth::id())->whereDate('start_time', now()->toDateString())->exists();
        if ($todayWork) {
            return redirect('main')->with('error', '今日はすでに出勤済みです');
        }

        StartAndEndTime::create([
            'user_id' => Auth::id(),
            'start_time' => now(),
            'status' => 1
        ]);

        return redirect('main')->with('message', '出勤ありがとう');
    }

    public function end()
    {
        $work = StartAndEndTime::where('user_id', '=', Auth::id())
            ->where('status', 1)
            ->whereNull('end_time')
            ->latest()
            ->first();

        if (!$work) {
            return redirect('main')->with('error', '今日はすでに退勤済みです');
        }

        $work->end_time = now();
        $work->status = 2;
        $work->save();

        return redirect('main')->with('message', 'お疲れ様');
    }
}
