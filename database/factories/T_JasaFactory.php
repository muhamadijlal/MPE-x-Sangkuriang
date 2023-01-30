<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class T_JasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaksi_id' => $this->faker->numberBetween(1, 500),
            'jasa_id' => $this->faker->numberBetween(1,10),
            'qty' => $this->faker->numberBetween(1,10)
        ];
    }
}
