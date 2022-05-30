<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Seeder;

class ExchangeRatesSeeder extends Seeder
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
            ExchangeRate::create([
                'source' => $value['source'],
                'target' => $value['target'],
                'rate' => $value['rate'],
            ]);
        }
    }

    public function data()
    {
        return array(
            array('source' => 'energy','target' => 'crypto','rate' => '1'),
            array('source' => 'crypto','target' => 'energy','rate' => '1'),
            array('source' => 'fiat','target' => 'crypto','rate' => '1.05263157'),
            array('source' => 'crypto','target' => 'fiat','rate' => '1.33333333'),
        );
    }
}
