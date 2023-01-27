<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->randomElement(['helper','teknisi']),
            'upah' => $this->faker->numberBetween(10,90),
            'keterangan' => $this->faker->sentence(12, true),
        ];
    }
}
