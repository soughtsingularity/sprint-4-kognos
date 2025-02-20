<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = collect([]);//$user->courses()->withPivot('progress', 'medal')->get();

        return view('user.dashboard', compact('user', 'courses'
        ));
    }

    public function unenroll($id)
    {
        //Auth::user()->courses()->detach($id);
        return redirect()->route('user.dashboard')->with('succes', 'Te has desapuntado del curso');
    }
}
