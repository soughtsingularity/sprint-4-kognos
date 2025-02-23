<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;

Route::middleware(['web'])->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        Route::delete('/courses/{id}/unenroll', [UserDashboardController::class, 'unenroll'])->name('courses.unenroll');
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('users', UserController::class);
        });
        Route::delete('/delete-account', [UserController::class, 'deleteOwnAccount'])->name('delete-account');
    });
});





