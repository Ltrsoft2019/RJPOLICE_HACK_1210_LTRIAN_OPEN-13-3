<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\policedetail;
use App\Models\policestation;
use App\Models\city;
use App\Models\countries;
use App\Models\districss;
use App\Models\states;
use App\Models\policeposition;

class policeprofile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch_number  = session()->get('batchId');

        $data = policedetail::where('batch_number', $batch_number)->get();
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

        return view('frontend.users-profile', compact('data','policestation','states','districss','countries','city','policeposition'));

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
