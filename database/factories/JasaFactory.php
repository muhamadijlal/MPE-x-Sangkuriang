<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $jasa = [
            'pembersihan saluran AC',
            'pembersihan saluran udara',
            'penggantian freon',
            'Pergantian Kompressor AC Floor Standing',
            'Pembersihan Kompresor AC',
            'Pembersihan Filter AC',
            'pembersihan kompressor AC Floor Standing',
            'Service AC',
            'Service saluran udara',
            'Service saluran cerobong'
        ];

        return [
            'nama'=> $this->faker->randomElement($jasa),
            'deskripsi'=> $this->faker->sentence(20, true),
            'satuan'=> $this->faker->randomElement(['lot','pcs','can']),
            'harga'=> $this->faker->numberBetween(999999, 999999999)
        ];
    }
}
