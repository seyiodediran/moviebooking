<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    public function user() {
        $this->belongsTo(User::class);
    }

    public function movielisting() {
        $this->belongsTo(User::class);
    }
    use HasFactory;
}
