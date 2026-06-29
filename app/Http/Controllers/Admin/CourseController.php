<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::select('id', 'title', 'description', 'status')->withCount('users')->get();
        $totalCourses = Course::count();
        $publishedCount = Course::where('status', 'published')->count();
        $draftCount = Course::where('status', 'draft')->count();

        return view('admin.courses.index', compact('courses', 'totalCourses', 'publishedCount', 'draftCount'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }
    public function store(Request $request)
    {
        // dd('BEFORE VALIDATION');
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'skills' => 'required|string|max:255',
            'status' => 'required|in:published,draft',
        ]);
        //  dd($data);

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
    }
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }
    public function update(Request $request, Course $course)
    {
        // dd('BEFORE VALIDATION');
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            // 'skills' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
        ]);
        //  dd($data);

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
}
