<?php

namespace App\Http\Controllers;

use App\Models\StudentInformation;
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

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StudentInformation $student)
    {
        return view("pages.guard.violators-list.create", [
            'student' => $student
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'violation' => 'required|string|max:255',
            'violation_date' => 'required',
            'violation_time' => 'required',
            'comment' => 'nullable',
        ]);

        Violator::create([
            "student_information_id" => $request->student_information_id,
            "violation" => $request->violation,
            "violation_date" => $request->violation_date,
            "violation_time" => $request->violation_time,
            "status" => "pending",
            "comment" => $request->comment,
        ]);

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
