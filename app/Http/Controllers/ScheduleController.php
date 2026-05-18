<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedules;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function get() {
        return Schedules::where('user_id', Auth::id())->get();
    }

    public function register(Request $request) {
        try {
            Schedules::create([
            'title' => $request->title,
            'date' => $request->date,
            'user_id' => Auth::id(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => $request->status
        ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
