<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Satarday'],
            ['title' => 'Sunday'],
            ['title' => 'Monday'],
            ['title' => 'Tuesday'],
            ['title' => 'Wednesday'],
            ['title' => 'Thursday'],
            ['title' => 'Friday']
        ];

        $days = [];

        foreach($data as $item) {
            $days[] = [
                'title' => $item['title'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        Day::insert($days);
    }
}
