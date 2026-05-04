<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StartAndEndTime;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function working()
    {
        $workingUsers = StartAndEndTime::with('user')->where('status', 1)->get();
        return view('admin.working', compact('workingUsers'));
    }

    public function monthlySalaryTotal(Request $request) {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));

        $total = StartAndEndTime::whereYear('start_time', $year)
            ->whereMonth('start_time', $month)
            ->whereNotNull('end_time')
            ->get()
            ->sum('salary_sum');
        
        return view('admin.salary_total', compact('total', 'year', 'month'));
    }
}
