<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

$averageRating = Rating::avg('rating');

class RatingsController extends Controller
{
    //
    public function store(Request $request) {

        $formfields = $request->validate([
            'rating' => 'required',
            'movie_listings_id' => 'required'
        ]);

        $formfields['user_id'] = auth()->id();
        Rating::create($formfields);
        return back()->with('message', 'Comment succesfully posted');
    }

}
