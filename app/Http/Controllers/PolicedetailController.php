<?php

namespace App\Http\Controllers;

use App\Models\policedetail;
use App\Models\policestation;
use App\Models\city;
use App\Models\countries;
use App\Models\districss;
use App\Models\states;
use App\Models\policeposition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicedetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = policedetail::all();
        foreach ($data as $complaint) {
            $stationid  = $complaint->station_id    ;
            $station = policestation::find($stationid );
            $stationName = $station ? $station->police_station_name : 'Unknown'; // Check if the user exists
            $complaint->police_station_name = $stationName;

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

            $policepositionid  = $complaint->position_id    ;
            $policepositions = policeposition::find($policepositionid );
            $policepositionName = $policepositions ? $policepositions->position_name : 'Unknown'; // Check if the user exists
            $complaint->position_name = $policepositionName;
        }
        $policestation = policestation::all();
        $policeposition = policeposition::all();

        $states = states::all();
        $districss = districss::all();
        $countries = countries::all();
        $city = city::all();

        return view('frontend.TotalPolice', compact('data','policestation','states','districss','countries','city','policeposition'));
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

        $filename='';
        if($request->hasFile('police_photo_path')){
            $filename=$request->getSchemeAndHttpHost().'/police_api/inputfiles/'.time().'.'.$request->police_photo_path->extension();
            $request->police_photo_path->move(public_path('/police_api/inputfiles/'),$filename);
        }
        
        $record =new policedetail;
        $record->batch_number = $request['batch_number'];
        $record->station_id  = $request['station_id'];
        $record->authority = $request['authority'];
        $record->police_fname = $request['police_fname'];
        $record->police_mname = $request['police_mname'];
        $record->police_lname = $request['police_lname'];
        $record->police_email = $request['police_email'];
        $record->police_password = $request['police_password'];
        $record->police_gender = $request['police_gender'];
        $record->police_dob = $request['police_dob'];
        $record->police_adhar = $request['police_adhar'];
        $record->police_mobile1 = $request['police_mobile1'];
        $record->police_mobile2 = $request['police_mobile2'];
        $record->police_photo_path = $filename;
        $record->police_address = $request['police_address'];
        $record->police_latitude = '0';
        $record->police_longitude = '0';

        $record->country_id  = $request['country_id'];
        $record->state_id = $request['state_id'];
        $record->district_id = $request['district_id'];
        $record->city_id = $request['city_id'];  
        $record->position_id  = $request['position_id'];
        $record->save();
        return redirect('/TotalPolice');
    }

    /**
     * Display the specified resource.
     */
    public function show(policedetail $policedetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(policedetail $policedetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $record = policedetail::find($id);
        $record->batch_number = $request['batch_number'];
        $record->station_id  = $request['station_id'];
        $record->authority = $request['authority'];
        $record->police_fname = $request['police_fname'];
        $record->police_mname = $request['police_mname'];
        $record->police_lname = $request['police_lname'];
        $record->police_email = $request['police_email'];
        $record->police_gender = $request['police_gender'];
        $record->police_dob = $request['police_dob'];
        $record->police_adhar = $request['police_adhar'];
        $record->police_mobile1 = $request['police_mobile1'];
        $record->police_mobile2 = $request['police_mobile2'];
        $record->police_photo_path = $request['police_photo_path'];
        $record->police_address = $request['police_address'];
        $record->country_id  = $request['country_id'];
        $record->state_id = $request['state_id'];
        $record->district_id = $request['district_id'];
        $record->city_id = $request['city_id'];  
        $record->position_id  = $request['position_id'];
    

        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(policedetail $policedetail)
    {
        //
    }
}
