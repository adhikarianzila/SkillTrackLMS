<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentSkill;

class DashboardController extends Controller
{
    public function index()
    {
        $student = auth()->user();

        $skills = StudentSkill::with('skill')->where('student_id', $student->id)->get();

        $totalSkills = $skills->count();
        $avgProgress = $skills->avg('progress') ?? 0;

        return view('dashboard', compact('skills', 'totalSkills', 'avgProgress'));
    }

    public function stats()
    {
        $student = auth()->user();

        return response()->json([
            'total_courses' => $student->courses()->count(),
            'completed_courses' => $student->completedCourses()->count(),
            'skills_count' => StudentSkill::where('student_id', $student->id)->count(),
        ]);
    }
}
