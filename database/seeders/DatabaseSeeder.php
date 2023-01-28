<?php

namespace Database\Seeders;

use App\Models\Consumable;
use App\Models\Karyawan;
use App\Models\Role;
use App\Models\Jasa;
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
        Sparepart::factory(500)->create();
        Role::factory(2)->create();
        Karyawan::factory(6)->create();
        Transaksi::factory(500)->create();
        Jasa::factory(10)->create();
        T_Jasa::factory(20)->create();
        T_sparepart::factory(20)->create();
        Consumable::factory(20)->create();
    }
}
