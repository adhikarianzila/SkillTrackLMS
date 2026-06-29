<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $courses = Course::where('status','published')->get();
        return view('student.courses.index',compact('courses'));
    }
}
