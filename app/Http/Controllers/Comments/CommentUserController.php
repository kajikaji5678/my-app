<?php

namespace App\Http\Controllers;

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
