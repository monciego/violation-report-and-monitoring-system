<?php

namespace App\Http\Controllers;

use App\Models\StudentInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentsInformation = StudentInformation::latest()->paginate(6);
        return view("pages.guard.students-list.index", compact('studentsInformation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:255|unique:student_information,student_id',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'year_course' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'name_of_guardian' => 'nullable|string|max:255',
            'guardian_contact_number' => 'nullable|string|max:255',
        ]);


        // Calculate age
        $birthdate = Carbon::parse($validated['birthdate']);
        $age = $birthdate->age;

        // Add age to the validated data
        $validated['age'] = $age;

        // Create the Violator record
        StudentInformation::create($validated);

        return redirect()->back()->with("success-message", "Student Information created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentInformation $studentInformation)
    {
        return view("pages.guard.students-list.show", [
            'studentInformation' => $studentInformation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentInformation $studentInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentInformation $studentInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentInformation $studentInformation)
    {
        //
    }
}
