<?php

namespace Database\Seeders;

use App\Models\Consumable;
use App\Models\Karyawan;
use App\Models\Role;
use App\Models\Jasa;
use App\Models\Subtotal;
use App\Models\User;
use App\Models\T_Jasa;
use App\Models\Sparepart;
use App\Models\T_sparepart;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Hash;
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
        // Sparepart::factory(5)->create();
        Role::factory(3)->create();
        Karyawan::factory(3)->create();
        // Transaksi::factory(1)->create();
        Jasa::factory(3)->create();
        // T_Jasa::factory(5)->create();
        // T_sparepart::factory(20)->create();
        // Subtotal::factory(20)->create();
        // Consumable::factory(20)->create();

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => Hash::make('adminisal')
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'role' => 'user',
                'password' => Hash::make('user12345')
            ],
            
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
