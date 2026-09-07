<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notification = $request->user()->unreadNotifications()->get();
        return response()->json(NotificationResource::collection($notification));
    }
}
