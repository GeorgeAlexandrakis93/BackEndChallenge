<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoyageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->name(),
            'start' => Carbon::now(),
            'end' => Carbon::now(),
            'status' => $this->faker->name(),
            'revenues' => $this->faker->randomFloat($decimals, $min = 2, $max = 8),
            'expenses' => $this->faker->randomFloat($decimals, $min = 2, $max = 8),
            'profit' => $this->faker->randomFloat($decimals, $min = 2, $max = 8),
        ];
    }
}
