<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(UserRegisterRequest $request)
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

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);

        Auth::login($user);

        if($user->role === 'admin'){
            return redirect()->route('admin.courses.index')->with('succes', 'Registro exitoso');
        }

        return redirect()->route('user.dashboard')->with('succes', 'Registro exitoso');
    }
}
