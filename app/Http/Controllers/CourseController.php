<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $courses = $user->courses;

        return Inertia::render('Courses/Index/Index',[
            'courses' => $courses
        ]);
    }
    public function create(User $user) {
        $new_course = new Course();
        $new_course->user_id = $user->id; 
        $new_course->name = 'New course name';
        $new_course->description = 'New course description';
        $new_course->save();

        return Redirect()->back()->with('message', 'Course created successfully');

    }
    public function view(Course $course){
        return Inertia::render('Courses/View/Index',[
            'course' => $course
        ]);
    }
    public function edit(Course $course){
        return Inertia::render('Courses/Edit/Index',[
            'course' => $course
        ]);
    }
    public function update(Request $request, Course $course){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);
        // Check if the authenticated user is the owner of the course
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();
     
        return Redirect()->back()->with('flash.banner', 'Course updated successfully');
    }
    public function delete(Course $course){
        $course->delete();
        return Redirect(route('courses'));
    }
}
