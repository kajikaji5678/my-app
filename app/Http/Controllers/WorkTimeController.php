<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkTimeController extends Controller
{
    public function go() {
        return redirect('main')->with('message', '出勤ありがとう');
    }
}
