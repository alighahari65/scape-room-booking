<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScapeRoomTimeSlot extends Model
{
    use HasFactory;

    protected $table= 'scape_room_time_slot';

    public function scapeRoom()
    {
        return $this->belongsTo(ScapeRoom::class);
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }
}
