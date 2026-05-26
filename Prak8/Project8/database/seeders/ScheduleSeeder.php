<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Subject;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = Subject::all();

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        $times = [
            ['08:00:00', '10:00:00'],
            ['10:00:00', '12:00:00'],
            ['13:00:00', '15:00:00'],
            ['15:00:00', '17:00:00'],
        ];

        $floors = [1, 2, 3];
        $rooms = [1, 2, 3, 4, 5, 6];

        foreach ($subjects as $subject) {
            $time = $times[array_rand($times)];

            $floor = $floors[array_rand($floors)];
            $roomNum = $rooms[array_rand($rooms)];
            $room = $floor . '.' . $roomNum;

            $day = $days[array_rand($days)];

            Schedule::create([
                'subject_id' => $subject->id,
                'day' => $day,
                'start' => $time[0],
                'end' => $time[1],
                'room' => $room,
            ]);
        }
    }
}