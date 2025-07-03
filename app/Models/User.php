<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id', 'wallet_amount'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
    protected $appends = ['full_image'];
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFullImageAttribute()
    {
        return asset('storage/' . $this->image);
    }
    public function parking()
    {
        return $this->hasOneThrough(
            Parking::class,
            GuardParkingMap::class,
            'guard_id',  // Foreign key on GuardParkingMap table
            'id',        // Foreign key on Parking table
            'id',        // Local key on User table
            'parking_id' // Local key on GuardParkingMap table
        );
    }
    public function guardParkingId()
    {
        return optional($this->parking)->id; // returns single parking_id or null
    }
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'owner_id');
    }
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'vehicle_owner_id');
    }
}
