<?php

namespace Database\Seeders;

use App\Models\SuhuKelembabanSensor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuhuKelembabanSensorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SuhuKelembabanSensor::factory(3)->create();
    }
}
