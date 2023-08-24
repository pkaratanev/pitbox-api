<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'request_description',
        'work_description',
        'start_datetime',
        'status',

        // TODO: Implement parent_id column in order to add history of appointment changes
        // TODO: If parent_id is null the entity is a main appointment otherwise child of other main appointment
    ];

    /**
     * Appointment client
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Appointment garage
     *
     * @return BelongsTo
     */
    public function garage(): BelongsTo
    {
        return $this->belongsTo(Garage::class);
    }

    // TODO: Add Relation to chat model
}
