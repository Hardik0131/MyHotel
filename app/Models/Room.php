<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'slug',
        'description',
        'price_per_night',
        'max_guests',
        'bed_type',
        'image',
        'status'
    ];
    
    public function getRouteKeyName(){
        return 'slug';
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
