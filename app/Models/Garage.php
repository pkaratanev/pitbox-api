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
        // Json of ppl working here with images and contact data
        // Main contact data for garage (phone/email/telegram/viber....)
        'lat',
        'lng'
        // Tags array
        // Works on ENUM -> motorcycle/cars/trucks/bicycles
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

    // Work Time System Implementation | Each line for 1 garage
    /**
     * Schema::create('working_hours', function (Blueprint $table) {
     * $table->bigIncrements('id');
     * $table->time('sunday_open');
     * $table->time('sunday_close');
     * $table->time('monday_open');
     * $table->time('monday_close');
     * $table->time('tuesday_open');
     * $table->time('tuesday_close');
     * $table->time('wednesday_open');
     * $table->time('wednesday_close');
     * $table->time('thursday_open');
     * $table->time('thursday_close');
     * $table->time('friday_open');
     * $table->time('friday_close');
     * $table->time('saturday_open');
     * $table->time('saturday_close');
     * $table->timestamps();
     * });
     */
    // Also add non working days as dates.
    // Should default to holidays for each year API maybe but for now hand entered in config
}
