<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    public function index()
    {
        return view('toDo.setting');
    }

    public function icon(Request $request) {
        $request->validate([
            'icon' => ['required', 'image'],
        ]);

        $path = $request->file('icon')->store('icons', 'public');

        auth()->user()->update([
            'icon' => $path,
        ]);

        return back();
    }
}
