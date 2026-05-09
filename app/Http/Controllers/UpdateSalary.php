<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SalaryRequest;

class UpdateSalary extends Controller
{
    public function up(Request $request) {
        $user = Auth::user();
        SalaryRequest::create([
            'user_id' => $user->id,
            'reason' => $request->reason,
            'before_salary' => $user->hourly_wage,
            'after_salary' => $request->hourly_wage,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('msg', '申請しました。');

    }
}
