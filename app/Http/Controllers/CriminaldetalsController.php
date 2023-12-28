<?php

namespace App\Http\Controllers;

use App\Models\criminaldetals;
use App\Models\city;
use App\Models\countries;
use App\Models\districss;
use App\Models\states;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CriminaldetalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = criminaldetals::all();
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
        return view('frontend.Criminal', compact('data','states','districss','countries','city'));
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
        $record =new criminaldetals;
        $record->criminal_fname = $request['criminal_fname'];
        $record->criminal_mname = $request['criminal_mname'];
        $record->criminal_lname = $request['criminal_lname'];
        $record->criminal_address = $request['criminal_address'];
        $record->criminal_dob = $request['criminal_dob'];
        $record->gender = $request['gender'];
        // $record->investigation_witness_mobile = $request['investigation_witness_mobile'];
        $record->criminal_email = $request['criminal_email'];
        $record->criminal_photo = $request['criminal_photo'];
        $record->criminal_adhar = $request['criminal_adhar'];
        // $record->witness_pan = $request['witness_pan'];
        $record->country_id = $request['country_id'];
        $record->state_id = $request['state_id'];
        $record->district_id = $request['district_id'];
        $record->city_id = $request['city_id'];
        
        $record->save();
        return redirect('/criminal');

    }

    /**
     * Display the specified resource.
     */
    public function show(criminaldetals $criminaldetals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(criminaldetals $criminaldetals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = criminaldetals::find($id);
        $record->criminal_fname = $request['criminal_fname'];
        $record->criminal_mname = $request['criminal_mname'];
        $record->criminal_lname = $request['criminal_lname'];
        $record->criminal_address = $request['criminal_address'];
        $record->criminal_dob = $request['criminal_dob'];
        $record->gender = $request['gender'];
        // $record->investigation_witness_mobile = $request['investigation_witness_mobile'];
        $record->criminal_email = $request['criminal_email'];
        $record->criminal_photo = $request['criminal_photo'];
        $record->criminal_adhar = $request['criminal_adhar'];
        // $record->witness_pan = $request['witness_pan'];
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
    public function destroy(criminaldetals $criminaldetals)
    {
        //
    }
}
