<?php

use App\Http\Controllers\CourseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


//Course
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->get('/courses', [CourseController::class, 'index'])->name('courses');

//Course Create
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->post('/courses/{user}', [CourseController::class, 'create'])->name('courses.create');
