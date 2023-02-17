<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\MovieListings;

class ReviewController extends Controller
{
    //


    public function store(Request $request)
    {
        $formfields = $request->validate([
            'review_text' => 'required',
            'movie_listings_id' => 'required'
        ]);

        
        $formfields['user_id'] = auth()->id();
        Review::create($formfields);
        return back()->with('message', 'Comment succesfully posted');
    }
}
