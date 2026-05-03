<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateSalary extends Controller
{
    public function up(Request $request) {
        $user = Auth::user();
        $user->hourly_wage = $request->hourly_wage;
        $user->save();
        return redirect('salary')->with('msg', '更新しました');
    }
}
