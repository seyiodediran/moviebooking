<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{
    public function theatre()
    {
        return $this->belongsTo(Theatre::class, 'theatres_id');
    }
    use HasFactory;
}
