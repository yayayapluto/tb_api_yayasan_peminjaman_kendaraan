<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id_booking',
        'id_vehicle',
        'id_user',
        'id_driver',
        'driver_name',
        'service',
        'image',
        'from_address',
        'from_lon',
        'from_lat',
        'to_address',
        'to_lon',
        'to_lat',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'booking_id');
    }
}
