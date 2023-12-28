<?php

namespace App\Http\Controllers;

use App\Models\complaints;
use App\Models\complaintstypes;
use App\Models\UserDetail;
use App\Models\complaintfir;
use App\Models\statuss;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = complaints::all();
        foreach ($data as $complaint) {
            $complaintstypeid  = $complaint->complaint_type_id  ;
            $complainttype = complaintstypes::find($complaintstypeid );
            $complainttypeName = $complainttype ? $complainttype->complaint_type_name : 'Unknown'; // Check if the user exists
            $complaint->complaint_type_name = $complainttypeName;

            $userId = $complaint->user_id;
            $user = UserDetail::find($userId);
            $userName = $user ? $user->user_fname : 'Unknown'; // Check if the user exists
            $complaint->user_fname = $userName;

            $usermName = $user ? $user->user_mname : 'Unknown'; // Check if the user exists
            $complaint->user_mname = $usermName;
            
            $userlName = $user ? $user->user_lname : 'Unknown'; // Check if the user exists
            $complaint->user_lname = $userlName;

            $useraddress = $user ? $user->user_address : 'Unknown'; // Check if the user exists
            $complaint->user_address = $useraddress; 

            $complaintsfirid  = $complaint->complaint_fir_id   ;
            $complaintfir = complaintfir::find($complaintsfirid );
            $complaintfirName = $complaintfir ? $complaintfir->complaint_fir_name : 'Unknown'; // Check if the user exists
            $complaint->complaint_fir_name = $complaintfirName;

            $statusid  = $complaint->status_id    ;
            $status = statuss::find($statusid );
            $statusName = $status ? $status->status_name : 'Unknown'; // Check if the user exists
            $complaint->status_name = $statusName;
        }
        $complaintstypes=complaintstypes::all();   
        $complaintfir=complaintfir::all();   
        $statuss=statuss::all();   

        return view('frontend.TotalComplaint', compact('data','complaintstypes','complaintfir','statuss'));

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
        $record =new complaints;
        $record->station_id = '1';
        $record->user_id = '1';

        $record->complaint_type_id = $request['complaint_type_id'];
        $record->complaint_subject = $request['complaint_subject'];
        $record->complaint_description = $request['complaint_description'];
        $record->complaint_against = $request['complaint_against'];
        $record->incident_date = $request['incident_date'];
        $record->complaint_fir_id = $request['complaint_fir_id'];
        $record->complaint_location = $request['complaint_location'];
        $record->status_id = $request['status_id'];


        $record->save();
        return redirect('/TotalCompalint');
    }

    /**
     * Display the specified resource.
     */
    public function show(complaints $complaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(complaints $complaints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = complaints::find($id);
        $record->complaint_type_id = $request['complaint_type_id'];
        $record->complaint_subject = $request['complaint_subject'];
        $record->complaint_description = $request['complaint_description'];
        $record->complaint_against = $request['complaint_against'];
        $record->incident_date = $request['incident_date'];
        $record->complaint_fir_id = $request['complaint_fir_id'];
        $record->complaint_location = $request['complaint_location'];
        $record->status_id = $request['status_id'];


        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(complaints $complaints)
    {
        //
    }
}
