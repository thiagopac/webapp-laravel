<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(array('uuid' => 'c8f14790-243b-4085-9161-d51d3b52ad40', 'id' => '1','first_name' => 'Vatios','last_name' => 'LTDA','email' => 'vatios@vatios.com.br','password' => '$2y$10$9TBl0KbNaey1Zg81TU3ECOwvG/Xl.Zl2H0ClgHqpFJEuPCLVEGE/6','remember_token' => NULL, 'wallet_address' => '0x1bf2c53ee259Eb537198bA4610D419D509376823'));

        $role = Role::create(['name' => 'Administrador']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
