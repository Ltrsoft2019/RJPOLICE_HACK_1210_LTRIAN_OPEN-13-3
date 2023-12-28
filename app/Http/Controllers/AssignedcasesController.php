<?php

namespace App\Http\Controllers;

use App\Models\assignedcases;
use App\Models\policedetail;
use App\Models\complaints;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignedcasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = assignedcases::all();
        foreach ($data as $complaint) {
            $policeid  = $complaint->police_id ;
            $police = policedetail::find($policeid );
            $policeName = $police ? $police->police_fname : 'Unknown'; // Check if the user exists
            $complaint->police_fname = $policeName;

            $policeName = $police ? $police->police_mname : 'Unknown'; // Check if the user exists
            $complaint->police_mname = $policeName;

            $policeName = $police ? $police->police_lname : 'Unknown'; // Check if the user exists
            $complaint->police_lname = $policeName;

            $complaintstypeid  = $complaint->complaint_id   ;
            $complainttype = complaints::find($complaintstypeid );
            $complainttypeName = $complainttype ? $complainttype->cmp_id : 'Unknown'; // Check if the user exists
            $complaint->cmp_id = $complainttypeName;
        }
        $policedetail = policedetail::all();
        $complaints = complaints::all();

        return view('frontend.AssignComplaint', compact('data','policedetail','complaints'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(assignedcases $assignedcases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(assignedcases $assignedcases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = assignedcases::find($id);
        $record->police_id  = $request['police_id'];
        $record->complaint_id  = $request['complaint_id'];

        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(assignedcases $assignedcases)
    {
        //
    }
}
