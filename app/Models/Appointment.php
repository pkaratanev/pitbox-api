<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        // datetime
        // durationType -> day, week, hour
    ];

    // Relation to Client hasOne?

    // Relation to Garage belongsTo

    // Relation to Chat hasOne
}
