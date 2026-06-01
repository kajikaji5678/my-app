<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsssignController extends Controller
{
    public function index() {
        return view('toDo.assign');
    }
}
