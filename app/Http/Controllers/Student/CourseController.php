<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'published')->get();
        return view('student.courses.index', compact('courses'));
    }
    public function show(Course $course)
    {
        return view('student.courses.show', compact('course'));
    }
    public function enroll(Course $course)
    {
        auth()->user()->courses()->syncWithoutDetaching($course->id);

        return back()->with('success', 'Successfully enrolled!');
    }
}
