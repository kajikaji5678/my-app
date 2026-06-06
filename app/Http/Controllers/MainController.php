<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function get() {
        $notification = auth()->user()->notifications;
        return view('toDo.main', $notification);
    }
}
