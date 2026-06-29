<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/course', function () {
//     return view('courses.index');
// });
// Route::get('/course', [CourseController::class, 'index'])->name('course.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboard stats (if needed separately)
    Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('dashboard.stats');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('courses', AdminCourseController::class);
        Route::resource('lessons', AdminLessonController::class);
    });

Route::middleware(['auth', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/courses', [StudentCourseController::class, 'index'])->name('courses.index');
        // Continue in a course
        Route::get('/courses/{course}', [StudentCourseController::class, 'show'])->name('courses.show');
        // Enroll in a course
        Route::post('/courses/{course}/enroll', [StudentCourseController::class, 'enroll'])->name('courses.enroll');
    });
