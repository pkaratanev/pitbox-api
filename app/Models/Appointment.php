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
        // description by mechanic of what was performed
        // datetime
        // durationType -> day, week, hour
        // parent id system so we have appointment history of changes
        // status enum -> requested/in progress/completed
    ];

    // Relation to Client hasOne?

    // Relation to Garage belongsTo

    // Relation to Chat hasOne
}
