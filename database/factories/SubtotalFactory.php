<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubtotalFactory extends Factory
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
            'total_harga_sparepart' => $this->faker->numberBetween(1000,1000000),
            'total_harga_consumable' => $this->faker->numberBetween(1000,1000000),
            'total_harga_jasa' => $this->faker->numberBetween(1000,1000000),
            'total_harga' => $this->faker->numberBetween(1000,1000000)
        ];
    }
}
