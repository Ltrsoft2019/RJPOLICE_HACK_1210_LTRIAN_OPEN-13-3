<?php

namespace App\Http\Controllers;

use App\Models\complaintcomplate;
use App\Models\UserDetail;
use App\Models\complaintstypes;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplaintcomplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaint_fir_id = 1;
        $status_id = 3; 
        
        $data = complaintcomplate::where('complaint_fir_id', $complaint_fir_id)
                           ->where('status_id', $status_id)
                           ->get();
        
        foreach ($data as $complaint) {
            $userId = $complaint->user_id;
            $user = UserDetail::find($userId);
            $userName = $user ? $user->user_fname : 'Unknown'; // Check if the user exists
            $complaint->user_fname = $userName;

            $usermName = $user ? $user->user_mname : 'Unknown'; // Check if the user exists
            $complaint->user_mname = $usermName;
            
            $userlName = $user ? $user->user_lname : 'Unknown'; // Check if the user exists
            $complaint->user_lname = $userlName;

            $complaintstypeid  = $complaint->complaint_type_id  ;
            $complainttype = complaintstypes::find($complaintstypeid );
            $complainttypeName = $complainttype ? $complainttype->complaint_type_name : 'Unknown'; // Check if the user exists
            $complaint->complaint_type_name = $complainttypeName;
        }
        $complaintstypes=complaintstypes::all();        
        return view('frontend.Completedcomplaint', compact('data','complaintstypes'));
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
    public function show(complaintcomplate $complaintcomplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(complaintcomplate $complaintcomplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = complaintcomplate::find($id);
        $record->complaint_type_id = $request['complaint_type_id'];
        $record->complaint_subject = $request['complaint_subject'];
        $record->complaint_description = $request['complaint_description'];
        $record->complaint_against = $request['complaint_against'];
        $record->incident_date = $request['incident_date'];

        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(complaintcomplate $complaintcomplate)
    {
        //
    }
}
