<?php

namespace App\Http\Controllers;

use App\Models\investigations;
use App\Models\complaints;
use App\Models\statuss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestigationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = investigations::all();
        foreach ($data as $complaint) {
            $complaintstypeid  = $complaint->complaint_id   ;
            $complainttype = complaints::find($complaintstypeid );
            $complainttypeName = $complainttype ? $complainttype->complaint_subject : 'Unknown'; // Check if the user exists
            $complaint->complaint_subject = $complainttypeName;

            // $statusName = $complainttype ? $complainttype->status_id  : 'Unknown'; // Check if the user exists
            // $complaint->status_id  = $statusName;

            // $statusid  = $statusName   ;
            // $status = statuss::find($statusid );
            // $statusName = $status ? $status->status_name : 'Unknown'; // Check if the user exists
            // $complaint->status_name = $statusName;
        }
        $complaint = complaints::all();
        $status = statuss::all();

        return view('frontend.investigation-cases', compact('data','status','complaint'));
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
        $record =new investigations;
        $record->investigation_start_date = $request['investigation_start_date'];
        $record->investigation_end_date = $request['investigation_end_date'];
        $record->location = $request['location'];
        $record->investigation_description = $request['investigation_description'];
        $record->incedant_reporting = $request['incedant_reporting'];
        $record->evidance_property = $request['evidance_property'];
        $record->complaint_id = $request['complaint_id'];
        $record->save();
        return redirect('/investigation');
    }

    /**
     * Display the specified resource.
     */
    public function show(investigations $investigations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(investigations $investigations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = investigations::find($id);
        $record->complaint_id = $request['complaint_id'];
        $record->investigation_start_date = $request['investigation_start_date'];
        $record->investigation_end_date = $request['investigation_end_date'];
        $record->location = $request['location'];
        $record->incedant_reporting = $request['incedant_reporting'];
        $record->evidance_property = $request['evidance_property'];
        $record->investigation_description = $request['investigation_description'];

        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(investigations $investigations)
    {
        //
    }
}
