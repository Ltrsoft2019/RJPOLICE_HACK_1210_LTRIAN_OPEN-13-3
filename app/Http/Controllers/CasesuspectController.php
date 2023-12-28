<?php

namespace App\Http\Controllers;

use App\Models\casesuspect;
use App\Models\city;
use App\Models\countries;
use App\Models\districss;
use App\Models\states;
use App\Models\complaints;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CasesuspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = casesuspect::all();
        foreach ($data as $complaint) {
            $cityid  = $complaint->city_id  ;
            $citys = city::find($cityid );
            $cityName = $citys ? $citys->city_name : 'Unknown'; // Check if the user exists
            $complaint->city_name = $cityName;

            $countryid  = $complaint->country_id   ;
            $country = countries::find($countryid );
            $countryName = $country ? $country->country_name : 'Unknown'; // Check if the user exists
            $complaint->country_name = $countryName;

            $districsid  = $complaint->district_id   ;
            $districs = districss::find($districsid );
            $districsName = $districs ? $districs->district_name : 'Unknown'; // Check if the user exists
            $complaint->district_name = $districsName;

            $stateid  = $complaint->state_id   ;
            $state = states::find($stateid );
            $stateName = $state ? $state->state_name : 'Unknown'; // Check if the user exists
            $complaint->state_name = $stateName;

            $complaintsid  = $complaint->complaint_id    ;
            $complaintss = complaints::find($complaintsid );
            $complaintsName = $complaintss ? $complaintss->cmp_id : 'Unknown'; // Check if the user exists
            $complaint->cmp_id = $complaintsName;  
        }
        $states = states::all();
        $districss = districss::all();
        $countries = countries::all();
        $city = city::all();
        $complaints = complaints::all();

        return view('frontend.Case-Suspect', compact('data','city','countries','districss','states','complaints'));
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
        $record =new casesuspect;
        $record->complaint_id = $request['complaint_id'];
        $record->complaint_suspect_fname = $request['complaint_suspect_fname'];
        $record->complaint_suspect_mname = $request['complaint_suspect_mname'];
        $record->complaint_suspect_lname = $request['complaint_suspect_lname'];
        $record->complaint_suspect_address = $request['complaint_suspect_address'];
        $record->complaint_suspect_dob = $request['complaint_suspect_dob'];
        $record->complaint_suspect_gender = $request['complaint_suspect_gender'];
        $record->complaint_suspect_mobile_no = $request['complaint_suspect_mobile_no'];
        $record->complaint_suspect_email = $request['complaint_suspect_email'];
        $record->complaint_suspect_photo_path = $request['complaint_suspect_photo_path'];
        $record->complaint_suspect_adhar = $request['complaint_suspect_adhar'];
        $record->complaint_suspect_pan = $request['complaint_suspect_pan'];
        $record->country_id = $request['country_id'];
        $record->state_id = $request['state_id'];
        $record->district_id = $request['district_id'];
        $record->city_id = $request['city_id'];
        
        $record->save();
        return redirect('/casesuspect');
    }

    /**
     * Display the specified resource.
     */
    public function show(casesuspect $casesuspect)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(casesuspect $casesuspect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = casesuspect::find($id);
        $record->complaint_suspect_fname = $request['complaint_suspect_fname'];
        $record->complaint_suspect_mname = $request['complaint_suspect_mname'];
        $record->complaint_suspect_lname = $request['complaint_suspect_lname'];
        $record->complaint_suspect_address = $request['complaint_suspect_address'];
        $record->complaint_suspect_dob = $request['complaint_suspect_dob'];
        $record->complaint_suspect_gender = $request['complaint_suspect_gender'];
        $record->complaint_suspect_mobile_no = $request['complaint_suspect_mobile_no'];
        $record->complaint_suspect_email = $request['complaint_suspect_email'];
        $record->complaint_suspect_photo_path = $request['complaint_suspect_photo_path'];
        $record->complaint_suspect_adhar = $request['complaint_suspect_adhar'];
        $record->complaint_suspect_pan = $request['complaint_suspect_pan'];
        $record->country_id = $request['country_id'];
        $record->state_id = $request['state_id'];
        $record->district_id = $request['district_id'];
        $record->city_id = $request['city_id'];

        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(casesuspect $casesuspect)
    {
        //
    }
}
