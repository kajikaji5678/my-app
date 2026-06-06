<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function get()
    {
        $user = auth()->user();
        $notifications = $user->notifications;
        return view('toDo.main', compact('notifications'));
    }
}
