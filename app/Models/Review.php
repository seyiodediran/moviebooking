<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $connection = 'mysql';
    protected $table = 'reviews';
    
    public function movielisting()
    {
        return $this->belongsTo(MovieListings::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
