<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_name',
        'building',
        'floor',
        'capacity',
        'facilities',
        'status'
    ];
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}