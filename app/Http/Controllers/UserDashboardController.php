<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = $user->courses()->withPivot('progress', 'medal')->get();

        return view('user.dashboard', compact('user', 'courses'
        ));
    }
}
