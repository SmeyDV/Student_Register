<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\CourseRegistration;

class RegistryController extends Controller
{
    // --- 1. STUDENT REGISTRATION ---
    public function studentForm()
    {
        return view('student_register');
    }

    public function storeStudent(Request $request)
    {
        Student::create($request->except('_token'));
        return back()->with('success', 'Student planted in the system!');
    }

    // --- 2. COURSE REGISTRATION ---
    public function courseForm()
    {
        // The user must type their Roll Number manually in the form.
        return view('course_register');
    }

    public function storeCourse(Request $request)
    {
        CourseRegistration::create([
            'roll_no' => $request->roll_no,
            'course' => $request->course
        ]);
        return back()->with('success', 'Course registered!');
    }

    // --- 3. REPORT ---
    public function report(Request $request)
    {
        $students = [];
        $selectedCourse = $request->course;

        if ($selectedCourse) {
            // Find all roll numbers tied to this course
            $rollNumbers = CourseRegistration::where('course', $selectedCourse)->pluck('roll_no');

            // Fetch the actual student profiles using those roll numbers
            $students = Student::whereIn('roll_no', $rollNumbers)->get();
        }

        return view('report', compact('students', 'selectedCourse'));
    }
}
