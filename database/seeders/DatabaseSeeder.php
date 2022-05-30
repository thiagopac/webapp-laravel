<?php

namespace Database\Seeders;

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
        $this->call([
            CreateAdminUserSeeder::class,
            PermissionsSeeder::class,
            RolesSeeder::class,
            RoleHasPermissionsSeeder::class,
            CountriesSeeder::class,
            RegionsSeeder::class,
            StatesSeeder::class,
            CitiesSeeder::class,
            ExchangeRatesSeeder::class,
            UsersSeeder::class,
        ]);
    }
}

