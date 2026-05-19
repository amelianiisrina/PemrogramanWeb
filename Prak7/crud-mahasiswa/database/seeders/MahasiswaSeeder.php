<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '2401',
            'nama' => 'Andi',
            'jurusan' => 'Informatika',
            'alamat' => 'Padang'
        ]);

        Mahasiswa::create([
            'nim' => '2402',
            'nama' => 'Bayu',
            'jurusan' => 'Teknik Pertambangan',
            'alamat' => 'Tanjung Pinang'
        ]);
    }
}
