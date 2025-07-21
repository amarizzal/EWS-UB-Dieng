<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EwsRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EwsRecord::create([
            'name' => 'Pasien 1',
            'medic_number' => '1234567890',
            'score_1' => 1,
            'score_2' => -2,
            'score_3' => 2,
            'score_4' => 1,
            'score_5' => 0,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        EwsRecord::create([
            'name' => 'Pasien 2',
            'medic_number' => '1234567891',
            'score_1' => 0,
            'score_2' => 0,
            'score_3' => 0,
            'score_4' => 0,
            'score_5' => 0,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        EwsRecord::create([
            'name' => 'Pasien 3',
            'medic_number' => '1234567892',
            'score_1' => 0,
            'score_2' => 1,
            'score_3' => 0,
            'score_4' => 2,
            'score_5' => 1,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
