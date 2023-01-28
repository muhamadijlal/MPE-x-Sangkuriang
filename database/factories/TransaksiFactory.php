<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pt = [
            'PT. Elastomix Indonesia',
            'PT Indofood Sukses Makmur Tbk',
            'PT Wings Surya',
            'Ezaki Glico Co., Ltd',
            'PT Chang Shin Indonesia',
            'Honda Motor Company, Ltd.',
            'Hino Motors, Ltd.,',
            'Toyota Motor Corporation',
            'PT Yamaha Indonesia Motor Manufacturing',
            'PT Pupuk Kujang'];

        $status_pengerjaan = ['proses','po','selesai'];

        $status_pembayaran = ['belum_bayar','dp','lunas'];

        return [
            'nama' => $this->faker->randomElement($pt),
            'penanggung_jawab' => $this->faker->name(),
            'lokasi' => $this->faker->address(),
            'total_harga' => $this->faker->numberBetween(999999, 999999999),
            'status_pengerjaan' => $this->faker->randomElement($status_pengerjaan),
            'status_pembayaran' => $this->faker->randomElement($status_pembayaran),
            'perihal' => $this->faker->sentence(10, true),
            'tanggal' => $this->faker->dateTimeBetween('now','+3 years')
        ];
    }
}
