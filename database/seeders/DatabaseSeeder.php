<?php

namespace Database\Seeders;

use App\Models\Consumable;
use App\Models\Karyawan;
use App\Models\Role;
use App\Models\Jasa;
use App\Models\Subtotal;
use App\Models\T_Jasa;
use App\Models\Sparepart;
use App\Models\T_sparepart;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Sparepart::factory(5)->create();
        Role::factory(5)->create();
        Karyawan::factory(5)->create();
        // Transaksi::factory(1)->create();
        Jasa::factory(1)->create();
        // T_Jasa::factory(5)->create();
        // T_sparepart::factory(20)->create();
        // Subtotal::factory(20)->create();
        // Consumable::factory(20)->create();
    }
}
