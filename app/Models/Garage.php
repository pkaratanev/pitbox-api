<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garage extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'description',
        'lat',
        'lng'
        // Tags array
    ];

    /**
     * Shop owner
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Relation hasMany to review model
}
