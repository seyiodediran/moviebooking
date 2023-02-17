<?php

namespace App\Http\Controllers;

use App\Models\Dates;
use App\Models\MovieListings;
use App\Models\Theatre;
use Illuminate\Http\Request;

class TheatreController extends Controller
{
    //

    public function create(Request $request)
    {
        $movie_id = $request->input('movie_id');
        return view('theatre-create', ['movie_id' => $movie_id]);
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'theatre_name' => 'required',
            'theatre_location' => 'required',
            'theatre_website' => 'required',
            'theatre_dates' => 'required',
        ]);


    $theatre = new Theatre();
    $theatre->theatre_name = $request->input('theatre_name');
    $theatre->theatre_location = $request->input('theatre_location');
    $theatre->theatre_website = $request->input('theatre_website');
    $theatre->theatre_dates = $request->input('theatre_dates');
    $theatre->movie_listings_id = $request->input('movie_listings_id');
    $theatre->save($formfields);

    $dates = explode(',', $theatre->theatre_dates);

    foreach ($dates as $date) {
        $dateRecord = new Dates;
        $dateRecord->theatres_id = $theatre->id;
        $dateRecord->date = trim($date);
        $dateRecord->save();
    }

        return redirect('/')->with('message', 'theatres added succesfully');
    }
}
