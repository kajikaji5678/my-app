<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StartAndEndTime;

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
}
