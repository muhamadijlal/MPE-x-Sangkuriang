<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Role;
use App\Models\Sparepart;
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
    }
}
