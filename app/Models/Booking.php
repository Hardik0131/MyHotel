<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_name',
        'user_email',
        'check_in_date',
        'check_out_date',
        'expected_time', 
        'note',
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }
}