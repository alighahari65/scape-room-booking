<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimeSlot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scapeRooms(): BelongsToMany
    {
        return $this->belongsToMany(ScapeRoom::class);
    }

    public function scapeRoomsTimeSlots(): HasMany
    {
        return $this->hasMany(ScapeRoomTimeSlot::class)->withPivot('is_available');
    }

}
