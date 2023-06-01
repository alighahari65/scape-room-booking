<?php

namespace Database\Seeders;

use App\Models\ScapeRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScapeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'scape-room-1', 'max_participants' => '5', 'price' => '350000'],
            ['title' => 'scape-room-2', 'max_participants' => '3', 'price' => '450000'],
            ['title' => 'scape-room-3', 'max_participants' => '9', 'price' => '380000'],
        ];

        $rooms = [];

        foreach($data as $item) {
            $rooms[] = [
                'title' => $item['title'],
                'price' => $item['price'],
                'max_participants' => $item['max_participants'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        ScapeRoom::insert($rooms);
    }
}
