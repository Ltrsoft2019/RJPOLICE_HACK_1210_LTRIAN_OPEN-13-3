<?php

namespace App\Http\Controllers;

use App\Models\investigationwitness;
use App\Models\city;
use App\Models\countries;
use App\Models\districss;
use App\Models\states;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestigationwitnessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = investigationwitness::all();
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
        }
        $states = states::all();
        $districss = districss::all();
        $countries = countries::all();
        $city = city::all();
        return view('frontend.Investi-witness', compact('data','states','districss','countries','city'));
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
    public function show(investigationwitness $investigationwitness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(investigationwitness $investigationwitness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = investigationwitness::find($id);
        $record->investigation_witness_fname = $request['investigation_witness_fname'];
        $record->investigation_witness_mname = $request['investigation_witness_mname'];
        $record->investigation_witness_lname = $request['investigation_witness_lname'];
        $record->investigation_witness_address = $request['investigation_witness_address'];
        $record->investigation_witness_dob = $request['investigation_witness_dob'];
        $record->investigation_witness_gender = $request['investigation_witness_gender'];
        $record->investigation_witness_mobile = $request['investigation_witness_mobile'];
        $record->investigation_witness_email = $request['investigation_witness_email'];
        $record->investigation_witness_photo = $request['investigation_witness_photo'];
        $record->investigation_witness_adhar = $request['investigation_witness_adhar'];
        $record->witness_pan = $request['witness_pan'];
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
    public function destroy(investigationwitness $investigationwitness)
    {
        //
    }
}
