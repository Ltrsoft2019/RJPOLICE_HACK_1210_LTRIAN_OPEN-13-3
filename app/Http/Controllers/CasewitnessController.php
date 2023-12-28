<?php

namespace App\Http\Controllers;

use App\Models\casewitness;
use App\Models\city;
use App\Models\countries;
use App\Models\districss;
use App\Models\states;
use App\Models\complaints;   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CasewitnessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = casewitness::all();
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
        return view('frontend.Case-witness', compact('data','city','countries','districss','states','complaints'));
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
        $record =new casewitness;
        $record->complaint_id = $request['complaint_id'];
        $record->complaint_witness_fname = $request['complaint_witness_fname'];
        $record->complaint_witness_mname = $request['complaint_witness_mname'];
        $record->complaint_witness_lname = $request['complaint_witness_lname'];
        $record->complaint_witness_address	 = $request['complaint_witness_address'];
        $record->complaint_witness_dob = $request['complaint_witness_dob'];
        $record->complaint_witness_gender = $request['complaint_witness_gender'];
        $record->complaint_witness_mobile = $request['complaint_witness_mobile'];
        $record->complaint_witness_email = $request['complaint_witness_email'];
        $record->complaint_witness_photo_path = $request['complaint_witness_photo_path'];
        $record->complaint_witness_pan = $request['complaint_witness_pan'];
        $record->complaint_witness_adhar = $request['complaint_witness_adhar'];
        $record->country_id = $request['country_id'];
        $record->state_id = $request['state_id'];
        $record->district_id = $request['district_id'];
        $record->city_id = $request['city_id'];

        $record->save();
        return redirect('/casewitness');
    }

    /**
     * Display the specified resource.
     */
    public function show(casewitness $casewitness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(casewitness $casewitness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = casewitness::find($id);
        $record->complaint_witness_fname = $request['complaint_witness_fname'];
        $record->complaint_witness_mname = $request['complaint_witness_mname'];
        $record->complaint_witness_lname = $request['complaint_witness_lname'];
        $record->complaint_witness_address	 = $request['complaint_witness_address'];
        $record->complaint_witness_dob = $request['complaint_witness_dob'];
        $record->complaint_witness_gender = $request['complaint_witness_gender'];
        $record->complaint_witness_mobile = $request['complaint_witness_mobile'];
        $record->complaint_witness_email = $request['complaint_witness_email'];
        $record->complaint_witness_photo_path = $request['complaint_witness_photo_path'];
        $record->complaint_witness_pan = $request['complaint_witness_pan'];
        $record->complaint_witness_adhar = $request['complaint_witness_adhar'];
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
    public function destroy(casewitness $casewitness)
    {
        //
    }
}
