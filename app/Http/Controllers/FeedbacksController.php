<?php

namespace App\Http\Controllers;

use App\Models\feedbacks;
use App\Models\feedback_categories;
use App\Models\UserDetail;
    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = feedbacks::all();
        foreach ($data as $complaint) {
            $feedback_categoriesid  = $complaint->feedback_category_id   ;
            $feedback_categories = feedback_categories::find($feedback_categoriesid );
            $feedback_categoriesName = $feedback_categories ? $feedback_categories->feedback_category_name : 'Unknown'; // Check if the user exists
            $complaint->feedback_category_name = $feedback_categoriesName;

            $userId = $complaint->user_id;
            $user = UserDetail::find($userId);
            $userName = $user ? $user->user_fname : 'Unknown'; // Check if the user exists
            $complaint->user_fname = $userName;

            $usermName = $user ? $user->user_mname : 'Unknown'; // Check if the user exists
            $complaint->user_mname = $usermName;
            
            $userlName = $user ? $user->user_lname : 'Unknown'; // Check if the user exists
            $complaint->user_lname = $userlName;
        }
        return view('frontend.Feedback', compact('data'));
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
    public function show(feedbacks $feedbacks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feedbacks $feedbacks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feedbacks $feedbacks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(feedbacks $feedbacks)
    {
        //
    }
}
