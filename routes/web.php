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

//View Course Individual
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->get('/courses/{course}', [CourseController::class, 'view'])->name('courses.view');

//Course Edit
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->get('/courses/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit');

//Course update
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->put('/courses/edit/{course}', [CourseController::class, 'update'])->name('courses.update');

//Course delete
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->delete('/courses/edit/{course}', [CourseController::class, 'delete'])->name('courses.delete');
