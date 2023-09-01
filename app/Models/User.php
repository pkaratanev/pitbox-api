<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Users Cars
     *
     * @return HasMany
     */
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    /**
     * Users Garage if user is owner
     *
     * @return HasOne
     */
    public function garage(): HasOne
    {
        return $this->hasOne(Garage::class, 'owner_id');
    }

    /**
     * Users Appointments
     *
     * @return BelongsToMany
     */
    public function appointments(): belongsToMany
    {
        return $this->belongsToMany(Appoitments::class, 'client_id');
    }

    /**
     * Users Reviews
     *
     * @return BelongsToMany
     */
    public function reviews(): belongsToMany
    {
        return $this->belongsToMany(Review::class, 'client_id');
    }

    // TODO: Implement public sharable appointment history

    /**
     * Who has access to admin panel.
     *
     * TODO: Add garage owners to admin panel somehow
     *
     * @param Panel $panel
     * @return Bool
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('admin');
    }
}
