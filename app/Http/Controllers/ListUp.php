<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StartAndEndTime;

class ListUp extends Controller
{
    public function list(Request $request) {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));

        // 個人の給与のみ表示されるように、あと月別トータルも
        $works = Auth::user()
            ->works()
            ->whereYear('start_time', $year)
            ->whereMonth('start_time', $month)
            ->latest()
            ->get();

        $total = $works->sum('salary_sum');
        $totalOvertimeMin = $works->sum('overtime_minutes');
        $isOvertimeWarning = $totalOvertimeMin >= 1000;
        return view('list', compact('works', 'year', 'month', 'total', 'isOvertimeWarning'));
    }
}
