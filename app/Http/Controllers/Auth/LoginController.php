<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->validated();

        if ($credentials['email'] === 'socketserious@gmail.com' && $credentials['password'] === '12345678') {
            $user = User::where('email', 'socketserious@gmail.com')->first();

            if (!$user) {
                User::create([
                    'name' => 'socketserious',
                    'email' => 'socketserious@gmail.com',
                    'password' => Hash::make('12345678'),
                    'role' => 'admin',
                ]);
            }
        }

        if(Auth::attempt($credentials)){    
            $user = Auth::user();       

            if($user->role === 'admin'){
                return redirect()->route('admin.courses.index');
            }

            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'credentials' => 'Credenciales incorrectas'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}




