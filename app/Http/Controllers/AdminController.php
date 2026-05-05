<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\SalaryRequest;
use Illuminate\Http\Request;
use App\Models\StartAndEndTime;
use App\Models\User;
use Auth;
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

    public function monthlySalaryTotal(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));

        $total = StartAndEndTime::whereYear('start_time', $year)
            ->whereMonth('start_time', $month)
            ->whereNotNull('end_time')
            ->get()
            ->sum('salary_sum');

        return view('admin.salary_total', compact('total', 'year', 'month'));
    }

    // 給与の承認
    public function approve(SalaryRequest $salaryRequest)
    {
        if ($salaryRequest->status !== 'pending') {
            return response()->json(['message' => 'すでに処理済み']);
        }

        $salaryRequest->status = 'approve';
        $salaryRequest->approved_by = Auth::id();
        $salaryRequest->save();

        // ユーザーの給与に反映
        $user = $salaryRequest->user;
        $user->hourly_wage = $salaryRequest->after_salary;
        $user->save();

        return response()->json(['message' => '承認しました']);
    }

    public function reject(SalaryRequest $salaryRequest)
    {
        if ($salaryRequest->status !== 'pending') {
            return response()->json(['message' => 'すでに処理済み']);
        }

        $salaryRequest->status = 'rejected';
        $salaryRequest->approved_by = Auth::id();
        $salaryRequest->save();

        return response()->json(['message' => '却下しました']);
    }
}
