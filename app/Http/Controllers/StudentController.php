<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function create()
    {
        return view('your.form.view.name'); // Point this to your blade file
    }

    public function store(Request $request)
    {
        // 1. Filter out the bad seeds (Validation)
        $validated = $request->validate([
            'roll_no' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'photo' => 'nullable|image',
            // add other rules as needed...
        ]);

        // 2. Handle the photo upload if one was provided
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('student_photos', 'public');
        }

        // 3. Plant it in MongoDB
        Student::create([
            'roll_no' => $request->roll_no,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'fathers_name' => $request->fathers_name,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'photo_path' => $photoPath,
            'city' => $request->city,
            'address' => $request->address,
            'departments' => $request->dept,
            'course' => $request->course,
        ]);

        // 4. Return to a safe shore
        return back()->with('success', 'Student successfully rooted in the database!');
    }
    public function showAssignForm()
    {
        // Fetch all students. We only need the roll_no and names to keep the query fast.
        $students = Student::all(['roll_no', 'first_name', 'last_name']);

        return view('course.assign', compact('students'));
    }
}
