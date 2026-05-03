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

        $works = Auth::user()
            ->works()
            ->whereYear('start_time', $year)
            ->whereMonth('start_time', $month)
            ->latest()
            ->get();

        return view('list', compact('works', 'year', 'month'));
    }
}
