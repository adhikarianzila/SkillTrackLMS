<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentSkill;
use Illuminate\Http\Request;

class CourseCompletionController extends Controller
{
    public function completeCourse($courseId)
    {
        $course = Course::with('skills')->findOrFail($courseId);
        $student = auth()->user();

        foreach ($course->skills as $skill) {
            $studentSkill = StudentSkill::firstOrCreate(
                [
                    'student_id' => $student->id,
                    'skill_id' => $skill->id,
                ],
                [
                    'progress' => 0,
                ],
            );

            // increase progress
            $studentSkill->progress = min(100, $studentSkill->progress + 20);
            $studentSkill->save();
        }

        return back()->with('success', 'Course completed successfully!');
    }
}
