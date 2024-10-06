<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'booking_id',
        'user_id',
        'admin_id',
        'status',
        'message',
        'is_read',
    ];
}
