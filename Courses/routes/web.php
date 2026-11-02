<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
   
    return redirect()->route('login');
});

// available only to user who are not signed in
Route::middleware('guest')->group(function(){
 Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

 Route::post('/register', [AuthController::class, 'register'])
 ->middleware('throttle:5,1')->name('register.store');

 Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

 Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5, 1')
            ->name('login.store');

});

//Available for use who need to be signed in
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [Authcontroller:: class, 'logout'])->name('logout');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
});