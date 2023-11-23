<?php

namespace Database\Seeders;

use App\Models\AmoniakSensor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmoniakSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AmoniakSensor::factory()->create();
    }
}
