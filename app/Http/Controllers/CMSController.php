<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function get() {
        return view('toDo.cms');
    }
}
