<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ScapeRoom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function timeSlots(): BelongsToMany
    {
        return $this->belongsToMany(TimeSlot::class)->withPivot('is_available');
    }

    public function scapeRoomTimeSlot()
    {
        return $this->hasMany(ScapeRoomTimeSlot::class);
    }
}
