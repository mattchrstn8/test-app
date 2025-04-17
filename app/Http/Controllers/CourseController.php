<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return Inertia::render('Courses/Index/Index');
    }
    public function create(User $user) {
        $new_course = new Course();
        $new_course->user_id = $user->id; 
        $new_course->name = 'New course name';
        $new_course->description = 'New course description';
        $new_course->save();

        return Redirect()->back()->with('message', 'Course created successfully');

    }
}
