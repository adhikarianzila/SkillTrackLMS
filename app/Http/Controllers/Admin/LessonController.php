<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        $courses = Course::pluck('title', 'id');
        return view('admin.lessons.create', compact('courses'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order' => 'required|integer|min:1',
        ]);

        Lesson::create($data);
        return redirect()->back()->with('Success', 'lesson created successfully');
    }
}
