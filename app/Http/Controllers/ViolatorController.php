<?php

namespace App\Http\Controllers;

use App\Models\Violator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViolatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'student_id' => 'required|string|max:255',
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
        Violator::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Violator $violator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Violator $violator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Violator $violator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Violator $violator)
    {
        //
    }
}
