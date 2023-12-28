<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\policedetail;
use App\Models\policeposition;



class logincontroler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return redirect('/');

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
        $request->validate([
            'batch_number' => 'required',
            'police_password' => 'required',
        ]);
        $data = policedetail::all();
        foreach ($data as $complaint) {
            $batchId = $complaint->batch_number;
            $password = $complaint->police_password;

          

            // echo '<pre>';
            // print_r(session()->all());
        
            if ($batchId == $request['batch_number'] && $password == $request['police_password']) {
                
                session()->put('batchId', $batchId);


                $police_fname  = $complaint->police_fname;
                $police_lname  = $complaint->police_lname;
                session()->put('police_fname', [$police_fname,$police_lname]);
    
               


                $policepositionid  = $complaint->position_id    ;
                $policepositions = policeposition::find($policepositionid );
                $policepositionName = $policepositions ? $policepositions->position_name : 'Unknown'; // Check if the user exists
                $complaint->position_name = $policepositionName;
                session()->put('position_name', $policepositionName);


                return redirect('/');



            }
        }
        return redirect('/register')->with('error', 'Invalid email or password');;
        
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
