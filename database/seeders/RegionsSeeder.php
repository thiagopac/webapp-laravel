<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionsSeeder extends Seeder
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
            Region::create([
                'id' => $value['id'],
                'name' => $value['name'],
                'status' => $value['status'],
            ]);
        }
    }

    public function data()
    {
        return array(
            array('id' => '1','name' => 'Norte','status' => '1'),
            array('id' => '2','name' => 'Nordeste','status' => '1'),
            array('id' => '3','name' => 'Sudeste','status' => '1'),
            array('id' => '4','name' => 'Sul','status' => '1'),
            array('id' => '5','name' => 'Centro-Oeste','status' => '1')
        );
    }
}
