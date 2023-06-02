<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public const DISCOUNT = 0.1;
    public const RESERVED = 'It Has Already Reserved';


    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scapeRoomTimeSlot()
    {
        return $this->belongsTo(ScapeRoomTimeSlot::class);
    }
}
