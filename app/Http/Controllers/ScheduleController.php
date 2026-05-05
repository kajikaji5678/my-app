<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function register(Request $request) {
        $schedule = Schedule::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'title' => $schedule->title,
            'date' => $request->date,
        ]);
    }
}
