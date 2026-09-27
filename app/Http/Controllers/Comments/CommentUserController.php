<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class CommentUserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name')->get();
        return response()->json($users);
    }
}
