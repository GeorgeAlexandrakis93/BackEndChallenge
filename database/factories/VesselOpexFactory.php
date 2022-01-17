<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VesselOpexFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => Carbon::now(),
            'expenses' => $this->faker->randomFloat($decimals, $min = 2, $max = 8),
        ];
    }
}
