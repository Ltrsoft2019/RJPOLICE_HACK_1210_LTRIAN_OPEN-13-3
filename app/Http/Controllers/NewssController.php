<?php

namespace App\Http\Controllers;

use App\Models\newss;
use App\Models\news_categories;
use App\Models\policestation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = newss::all();
        foreach ($data as $complaint) {
            $stationid  = $complaint->station_id    ;
            $station = policestation::find($stationid );
            $stationName = $station ? $station->police_station_name : 'Unknown'; // Check if the user exists
            $complaint->police_station_name = $stationName;

            $newscategoriesid  = $complaint->news_category_id     ;
            $newscategorie = news_categories::find($newscategoriesid );
            $newscategorieName = $newscategorie ? $newscategorie->news_category_name : 'Unknown'; // Check if the user exists
            $complaint->news_category_name = $newscategorieName;
        }

        $news_categories = news_categories::all();
        $policestation = policestation::all();

        return view('frontend.News', compact('data','news_categories','policestation'));
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
        $record =new newss;
        $record->like  = '0';

        $record->news_category_id  = $request['news_category_id'];
        $record->news_title = $request['news_title'];
        $record->station_id  = $request['station_id'];
        $record->news_description = $request['news_description'];
        $record->news_date = $request['news_date'];
        $record->save();
        return redirect('/News');
    }

    /**
     * Display the specified resource.
     */
    public function show(newss $newss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(newss $newss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = newss::find($id);
        $record->news_category_id  = $request['news_category_id'];
        $record->news_title = $request['news_title'];
        $record->station_id  = $request['station_id'];
        $record->news_description = $request['news_description'];
        $record->news_date = $request['news_date'];

        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newss $newss)
    {
        //
    }
}
