<?php

namespace App\Http\Controllers;

use App\Models\investigationsuspect;
use App\Models\city;
use App\Models\countries;
use App\Models\districss;
use App\Models\states;use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestigationsuspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = investigationsuspect::all();
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
        return view('frontend.Investi-Suspect', compact('data','states','districss','countries','city'));
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
        $record =new investigationsuspect;
        $record->fir_id  = $request['fir_idS'];
        $record->suspect_fname = $request['suspect_fname'];
        $record->suspect_mname = $request['suspect_mname'];
        $record->suspect_lname = $request['suspect_lname'];
        $record->suspect_address = $request['suspect_address'];
        $record->suspect_dob = $request['suspect_dob'];
        $record->suspect_gender = $request['suspect_gender'];
        $record->suspect_mobile_no = $request['suspect_mobile_no'];
        $record->suspect_email = $request['suspect_email'];
        $record->suspect_photo = $request['suspect_photo'];
        $record->suspect_adhar = $request['suspect_adhar'];
        $record->suspect_pan_no = $request['suspect_pan_no'];
        $record->country_id = $request['country_id'];
        $record->state_id = $request['state_id'];
        $record->district_id = $request['district_id'];
        $record->city_id = $request['city_id'];

        $record->save();
        return redirect('/investisuspect');
    }

    /**
     * Display the specified resource.
     */
    public function show(investigationsuspect $investigationsuspect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(investigationsuspect $investigationsuspect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = investigationsuspect::find($id);
        $record->fir_id  = $request['fir_idS'];

        $record->suspect_fname = $request['suspect_fname'];
        $record->suspect_mname = $request['suspect_mname'];
        $record->suspect_lname = $request['suspect_lname'];
        $record->suspect_address = $request['suspect_address'];
        $record->suspect_dob = $request['suspect_dob'];
        $record->suspect_gender = $request['suspect_gender'];
        $record->suspect_mobile_no = $request['suspect_mobile_no'];
        $record->suspect_email = $request['suspect_email'];
        $record->suspect_photo = $request['suspect_photo'];
        $record->suspect_adhar = $request['suspect_adhar'];
        $record->suspect_pan_no = $request['suspect_pan_no'];
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
    public function destroy(investigationsuspect $investigationsuspect)
    {
        //
    }
}
