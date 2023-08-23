<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // has text

    // has 1-5 stars -> calculates to 1.11 in garage page

    // belongsTo relation with User model

    // belongsTo Garage
}
