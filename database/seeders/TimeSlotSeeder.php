<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['time' => 'Satarday-Morning'],
            ['time' => 'Monday-Noon'],
            ['time' => 'Friday-Night'],
            ['time' => 'Thusday-Night'],
            ['time' => 'Sunday-Noon'],
        ];

        $times = [];

        foreach($data as $item) {
            $times[] = [
                'time' => $item['time'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        TimeSlot::insert($times);
    }
}
