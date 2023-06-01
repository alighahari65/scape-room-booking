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
            ['time' => 'Morning'],
            ['time' => 'Noon'],
            ['time' => 'Night'],

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
