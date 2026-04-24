<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegistryController;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome'); // Or whatever your dashboard view is named
})->name('welcome');

Route::get('/course/register', function () {
    // Fetch the students
    $students = Student::all(['roll_no', 'first_name', 'last_name']);

    // Pass them to the view
    return view('course_register', compact('students'));
});

Route::get('/test-db', function () {
    try {
        DB::connection('mongodb')->getPDO();
        return "You successfully connected to MongoDB Atlas!";
    } catch (\Exception $e) {
        return "Could not connect: " . $e->getMessage();
    }
});




















// 1. Student Form
Route::get('/student/register', [RegistryController::class, 'studentForm'])->name('student.form');
Route::post('/student/register', [RegistryController::class, 'storeStudent'])->name('student.store');

// 2. Course Form
Route::get('/course/register', [RegistryController::class, 'courseForm'])->name('course.form');
Route::post('/course/register', [RegistryController::class, 'storeCourse'])->name('course.store');

// 3. Report
Route::get('/report', [RegistryController::class, 'report'])->name('report');
