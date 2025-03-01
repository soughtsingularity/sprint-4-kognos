<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index(User $user)
    {
        $courses = $user->courses()->withPivot('progress', 'medal')->get();

        return view('user.dashboard', compact('user', 'courses'
        ));
    }
}
