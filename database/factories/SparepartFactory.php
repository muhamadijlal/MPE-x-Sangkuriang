<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SparepartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Custom data faker
        $nama = ['Compressor Scroll Copeland','Filter Dryer','Refrigerant R410A','Thermal Over Load Relay Togami'];

        $merek = ['Daikin','Sharp','Polytron','LG'];

        $type = ['ZP120KCE – TFD – 422','ZP83KCE – TFD – 421','TJ – 35 – 3',NULL];

        return [
            'nama' => $this->faker->randomElement($nama),
            'merek' => $this->faker->randomElement($merek),
            'type' => $this->faker->randomElement($type),
            'satuan' => $this->faker->randomElement(['lot','unit','pcs']),
            'qty' => $this->faker->randomDigit(),
            'harga' => $this->faker->numberBetween(100000, 100000000)
        ];
    }
}
