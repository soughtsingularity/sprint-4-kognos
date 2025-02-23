<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseChapterController;

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

            Route::get('/courses/{course}/start', [CourseChapterController::class, 'start'])
            ->name('courses.start');
            Route::get('/courses/{course}/chapter/{chapterIndex}',
                [CourseChapterController::class, 'show'])
                ->name('courses.chapter');
            Route::post('/courses/{course}/chapter/{chapterIndex}/complete',
                [CourseChapterController::class, 'completeChapter'])
                ->name('courses.chapter.complete');
                Route::resource('users', UserController::class);
                Route::resource('courses', CourseController::class);
            
        });
        Route::delete('/delete-account', [UserController::class, 'deleteOwnAccount'])->name('delete-account');
        

    });
});





