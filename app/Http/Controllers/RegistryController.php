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
        // 2. Fetch the students from MongoDB
        $students = Student::all(['roll_no', 'first_name', 'last_name']);

        // 3. Pass them to the view
        return view('course_register', compact('students'));
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
