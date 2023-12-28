<?php

namespace App\Http\Controllers;

use App\Models\criminalcases;
use App\Models\criminaldetals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CriminalcasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = criminalcases::all();
        foreach ($data as $complaint) {
            $criminaldetalsid  = $complaint->criminal_id   ;
            $criminaldetals = criminaldetals::find($criminaldetalsid );
            $criminaldetalsfName = $criminaldetals ? $criminaldetals->criminal_fname : 'Unknown'; // Check if the user exists
            $complaint->criminal_fname = $criminaldetalsfName;

            $criminaldetalsmName = $criminaldetals ? $criminaldetals->criminal_mname : 'Unknown'; // Check if the user exists
            $complaint->criminal_mname = $criminaldetalsmName;

            $criminaldetalslName = $criminaldetals ? $criminaldetals->criminal_lname : 'Unknown'; // Check if the user exists
            $complaint->criminal_lname = $criminaldetalslName;
        }
        $criminaldetal = criminaldetals::all();

        return view('frontend.Criminal-Cases', compact('data','criminaldetal'));
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
        $record =new criminalcases;
        $record->fir_id   = $request['fir_idS'];
        $record->criminal_id  = $request['criminal_id'];
        $record->punishment = $request['punishment'];
        $record->duration = $request['duration'];
        $record->save();
        return redirect('/criminalcases');
    }

    /**
     * Display the specified resource.
     */
    public function show(criminalcases $criminalcases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(criminalcases $criminalcases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = criminalcases::find($id);
        $record->criminal_id  = $request['criminal_id'];
        $record->punishment = $request['punishment'];
        $record->duration = $request['duration'];

        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(criminalcases $criminalcases)
    {
        //
    }
}
