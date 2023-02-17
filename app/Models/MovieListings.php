<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\Review;
use App\Models\Theatre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieListings extends Model
{
    protected $connection = 'mysql';
    protected $table = 'movie_listings';

    public function scopeFilter($query, array $filters){
        if($filters['genre'] ?? false) {
            $query->where('genre', 'like', '%' . request('genre') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('plot', 'like', '%' . request('search') . '%')
            ->orWhere('genre', 'like', '%' . request('search') . '%');
            
        }
    }

    //Movie Relationship to User 
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Review relationship to reviews
    public function reviews() {
        return $this->hasMany(Review::class)->with('user')->latest();
    }

    public function theatres() {
        return $this->hasMany(Theatre::class)->with('dates');
    }

    public function ratings() {
        return $this->hasMany(Rating::class)->with('movielisting');
    }

    use HasFactory;
}
