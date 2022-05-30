<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

//        $data = $this->data();
//
//        foreach ($data as $value) {
//            Permission::create([
//                'name' => $value['name'],
//            ]);
//        }

        $data = $this->data();

        foreach ($data as $value) {
            Permission::create([
                'name'       => $value['name'],
                'guard_name' => $value['guard_name'],
            ]);
        }
    }

    public function data()
    {
        return [
            ['name' => 'view-menu-manage-transactions', 'guard_name' => 'web'],
            ['name' => 'access-screen-manage-transactions', 'guard_name' => 'web'],
            ['name' => 'access-screen-activities-log', 'guard_name' => 'web'],
            ['name' => 'access-screen-system-log', 'guard_name' => 'web'],
            ['name' => 'access-screen-manage-users', 'guard_name' => 'web'],
            ['name' => 'access-screen-manage-roles', 'guard_name' => 'web'],
            ['name' => 'access-screen-manage-permissions', 'guard_name' => 'web'],
        ];
    }

//    public function data()
//    {
//        $data = [];
//        // list of model permission
//        $model = ['transaction', 'user', 'role', 'permission'];
//
//        foreach ($model as $value) {
//            foreach ($this->crudActions($value) as $action) {
//                $data[] = ['name' => $action];
//            }
//        }
//
//        return $data;
//    }
//
//    public function crudActions($name)
//    {
//        $actions = [];
//        // list of permission actions
//        $crud = ['create', 'read', 'update', 'delete'];
//
//        foreach ($crud as $value) {
//            $actions[] = $value.' '.$name;
//        }
//
//        return $actions;
//    }
}
