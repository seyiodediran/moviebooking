<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Theatre;
use Illuminate\Http\Request;
use App\Models\MovieListings;
use Illuminate\Support\Facades\DB;

class MovieListingsController extends Controller
{
    public function index()
    {
        return view('home', [
            'movies' => MovieListings::latest()->filter(request(['genre', 'search']))->paginate(3)
        ]);
    }

    public function show(MovieListings $id)
    {

        $averagerating = DB::table('ratings')->where('movie_listings_id', $id->id)->avg('rating');
        $ratingcount = DB::table('ratings')->count();
        return view('movie', [
            'movie' => $id,
            'reviews' => $id->reviews,
            'theatres' => $id->theatres,
            'averagerating' => $averagerating,
            'ratingcount' => $ratingcount
            
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {



        $formfields = $request->validate([
            'Title' => ['required'],
            'Plot' => 'required',
            'Genre' => 'required',
            'Year' => 'required',
            'Released' => 'required',
            'Rated' => 'required',
            'Director' => 'required',
            'Actors' => 'required',
            'Language' => 'required',
            'Runtime' => 'required',
        ]);

        if (request()->hasFile('Image')) {
            $formfields['Image'] = request()->file('Image')->store('Images', 'public');
        }

        $formfields['user_id'] = auth()->id();
        $movie = MovieListings::create($formfields);

        return redirect('/theatres?movie_id=' . $movie->id)->with('message', 'Listing succesfully created');
    }


    public function edit(MovieListings $id)
    {
        return view('edit', ['movie' => $id]);
    }

    public function update(Request $request, MovieListings $id)
    {
        //make sure logged in user is owner
        if ($id->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formfields = $request->validate([
            'Title' => ['required'],
            'Plot' => 'required',
            'Genre' => 'required',
            'Year' => 'required',
            'Released' => 'required',
            'Rated' => 'required',
            'Director' => 'required',
            'Actors' => 'required',
            'Language' => 'required',
            'Runtime' => 'required',
        ]);

        if (request()->hasFile('Image')) {
            $formfields['Image'] = request()->file('Image')->store('Images', 'public');
        }

        $id->update($formfields);

        return redirect()->back()->with('message', 'Listing updated succesfully');
    }


    public function destroy(MovieListings $id)
    {
        //make sure logged in user is owner
        if ($id->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $id->delete();

        return redirect('/')->with('message', 'Listing deleted succefully');
    }


    public function manage()
    {
        return view('manage', [
            'movies' => auth()->user()->movielistings()->get()
        ]);
    }
}
