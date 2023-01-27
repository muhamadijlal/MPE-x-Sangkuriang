<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_id' => $this->faker->randomNumber(1,2),
            'nama' => $this->faker->name('male'),
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->e164PhoneNumber(),
        ];
    }
}
