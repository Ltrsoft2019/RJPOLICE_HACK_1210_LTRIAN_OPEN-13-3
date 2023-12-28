<?php

namespace App\Http\Controllers;

use App\Models\newsphoto;
use App\Models\newss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsphotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = newsphoto::all();
        $news = newss::all();

        return view('frontend.News-photo', compact('data','news'));
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
        $record =new newsphoto;
        $record->news_id  = $request['news_id'];
        $record->news_photo_path = $request['news_photo_paths'];
        $record->save();
        return redirect('/Newsphoto');
    }

    /**
     * Display the specified resource.
     */
    public function show(newsphoto $newsphoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(newsphoto $newsphoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $record = newsphoto::find($id);
        $record->news_id  = $request['news_id'];
        $record->news_photo_path = $request['news_photo_path'];
      
        $record->update();
        return redirect()->back()->with('success', 'Qualification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newsphoto $newsphoto)
    {
        //
    }
}
