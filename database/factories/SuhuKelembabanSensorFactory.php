<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuhuKelembabanSensor>
 */
class SuhuKelembabanSensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */
    protected $model = SuhuKelembabanSensor::class;
    public function definition(): array
    {
        return [
            //
            "id_kandang"=>1,
            "suhu"=>fake()->randomFloat(2,10,40),
            "kelembaban"=> fake()->randomFloat(2,10,30),
        ];
    }
}
