<?php

namespace Database\Seeders;

use App\Models\ScapeRoom;
use App\Models\ScapeRoomTimeSlot;
use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScapeRoomTimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scapeRoomIds = ScapeRoom::get()->pluck('id');
        $timeSlotIds = TimeSlot::get()->pluck('id');

        $data = [];
        foreach( $timeSlotIds as $item) {
            $data[] = [
                'time_slot_id' => $timeSlotIds->random(),
                'scape_room_id' => $scapeRoomIds->random(),
                'is_available' => rand(0,1),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        ScapeRoomTimeSlot::insert($data);

    }
}
