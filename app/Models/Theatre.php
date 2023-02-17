<?php

namespace App\Models;

use App\Models\Dates;
use App\Models\MovieListings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theatre extends Model
{
    protected $connection = 'mysql';
    protected $table = 'theatres';

    public function movielisting()
    {
        return $this->belongsTo(MovieListings::class, 'movie_listings_id');
    }

    public function dates() {
        return $this->hasMany(Dates::class, 'theatres_id');
    }
    use HasFactory;
}
