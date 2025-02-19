<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginCOntroller::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




