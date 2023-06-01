<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScapeRoomResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'maxParticipants' => $this->max_participants,
            'price' => $this->price,
            'timeSlots' => TimeSlotResourse::collection($this->timeSlots)
        ];
    }
}
