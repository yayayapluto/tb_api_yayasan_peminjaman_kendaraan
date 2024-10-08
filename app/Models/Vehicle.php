<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vehicle extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id_vehicle',
        'brand',
        'model',
        'color',
        'nopol',
        'is_available',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_vehicle');
    }
}
