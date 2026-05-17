<?php

namespace App\Http\Controllers;

use App\Models\SalaryRequest;
use App\Models\Schedule;
use App\Models\StartAndEndTime;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

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

    public function salaryList()
    {
        $requests = SalaryRequest::where('status', 'pending')
            ->with(['user'])
            ->latest()
            ->get();

        // dd($requests->toArray());
        // デバック確認済み
        return view('admin.salary_change', compact('requests'));
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
        // dd(auth()->user());
        // デバック解決済み
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

        return response()->json([
            'message' => '承認しました'],
            200, [], JSON_UNESCAPED_UNICODE);
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

    // シフト表
    public function shift()
    {
        $works = Schedule::with('user:name,id')->get()
            ->map(fn($w) => [
                'name' => $w->user->name ?? null,
                'start_time' => $w->start_time,
                'end_time' => $w->end_time,
                'date' => $w->date,
                'user_id' => $w->user_id,
            ]);
        return view('admin.chartList', compact('works'));
    }

    public function shiftApproved(Request $request) {
        $schedule = Schedule::find($request->user_id);
        $schedule->approve = 'approved';
        $schedule->save();

        return response()->json([
            'message' => '承認しました'
        ]);
    }

}
