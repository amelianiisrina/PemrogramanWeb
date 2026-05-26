<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['name' => 'Pemrograman Web', 'sks' => 3],
            ['name' => 'Database', 'sks' => 3],
            ['name' => 'Algoritma', 'sks' => 2],
            ['name' => 'Jaringan Komputer', 'sks' => 3],
            ['name' => 'Sistem Operasi', 'sks' => 2],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
