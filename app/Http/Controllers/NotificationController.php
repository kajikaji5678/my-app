<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function get($id) {
        $notification = 
        auth()->user()->notifications()->find($id);
        $notification->markAsRead();

        return view('toDo.assign');
    }
}
