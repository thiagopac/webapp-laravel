<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();

        foreach ($data as $value) {
            $permission_id = $value['permission_id'];
            $role_id = $value['role_id'];
            DB::insert("insert into role_has_permissions (permission_id, role_id) values ($permission_id, $role_id)");

        }
    }

    public function data()
    {
        return array(
            array('permission_id' => '1','role_id' => '1'),
            array('permission_id' => '2','role_id' => '1'),
            array('permission_id' => '3','role_id' => '1'),
            array('permission_id' => '4','role_id' => '1'),
            array('permission_id' => '5','role_id' => '1'),
            array('permission_id' => '6','role_id' => '1'),
            array('permission_id' => '7','role_id' => '1'),
            array('permission_id' => '1','role_id' => '2'),
            array('permission_id' => '2','role_id' => '2'),
            array('permission_id' => '3','role_id' => '2'),
            array('permission_id' => '4','role_id' => '2'),
            array('permission_id' => '5','role_id' => '2'),
            array('permission_id' => '6','role_id' => '2'),
            array('permission_id' => '7','role_id' => '2')
        );
    }
}
