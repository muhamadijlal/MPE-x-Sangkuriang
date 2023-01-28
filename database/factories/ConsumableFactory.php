<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConsumableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaksi_id' => $this->faker->numberBetween(1,500),
            'nama' => $this->faker->randomElement(['Nitrogen For Flushing','tanding Pressure','Matrial','Alat Brazing lainnya']),
            'qty' => $this->faker->numberBetween(1,99),
            'satuan' => $this->faker->randomElement(['pcs','lot','can']),
            'harga' => $this->faker->numberBetween(999999, 999999999)
        ];
    }
}
