<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesSeeder extends Seeder
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
            State::create([
                'id' => $value['id'],
                'country_id' => $value['country_id'],
                'region_id' => $value['region_id'],
                'name' => $value['name'],
                'letter' => $value['letter'],
                'iso' => $value['iso'],
                'status' => $value['status'],
            ]);
        }
    }

    public function data()
    {
        return array(
            array('id' => '1','country_id' => '31','region_id' => '1','name' => 'Acre','letter' => 'AC','iso' => '12','status' => '0'),
            array('id' => '2','country_id' => '31','region_id' => '2','name' => 'Alagoas','letter' => 'AL','iso' => '27','status' => '0'),
            array('id' => '3','country_id' => '31','region_id' => '1','name' => 'Amazonas','letter' => 'AM','iso' => '13','status' => '0'),
            array('id' => '4','country_id' => '31','region_id' => '1','name' => 'Amapá','letter' => 'AP','iso' => '16','status' => '0'),
            array('id' => '5','country_id' => '31','region_id' => '2','name' => 'Bahia','letter' => 'BA','iso' => '29','status' => '0'),
            array('id' => '6','country_id' => '31','region_id' => '2','name' => 'Ceará','letter' => 'CE','iso' => '23','status' => '0'),
            array('id' => '7','country_id' => '31','region_id' => '5','name' => 'Distrito Federal','letter' => 'DF','iso' => '53','status' => '0'),
            array('id' => '8','country_id' => '31','region_id' => '3','name' => 'Espírito Santo','letter' => 'ES','iso' => '32','status' => '0'),
            array('id' => '9','country_id' => '31','region_id' => '5','name' => 'Goiás','letter' => 'GO','iso' => '52','status' => '0'),
            array('id' => '10','country_id' => '31','region_id' => '2','name' => 'Maranhão','letter' => 'MA','iso' => '21','status' => '0'),
            array('id' => '11','country_id' => '31','region_id' => '3','name' => 'Minas Gerais','letter' => 'MG','iso' => '31','status' => '1'),
            array('id' => '12','country_id' => '31','region_id' => '5','name' => 'Mato Grosso do Sul','letter' => 'MS','iso' => '50','status' => '0'),
            array('id' => '13','country_id' => '31','region_id' => '5','name' => 'Mato Grosso','letter' => 'MT','iso' => '51','status' => '0'),
            array('id' => '14','country_id' => '31','region_id' => '1','name' => 'Pará','letter' => 'PA','iso' => '15','status' => '0'),
            array('id' => '15','country_id' => '31','region_id' => '2','name' => 'Paraiba','letter' => 'PB','iso' => '25','status' => '0'),
            array('id' => '16','country_id' => '31','region_id' => '2','name' => 'Pernambuco','letter' => 'PE','iso' => '26','status' => '0'),
            array('id' => '17','country_id' => '31','region_id' => '2','name' => 'Piauí','letter' => 'PI','iso' => '22','status' => '0'),
            array('id' => '18','country_id' => '31','region_id' => '4','name' => 'Paraná','letter' => 'PR','iso' => '41','status' => '0'),
            array('id' => '19','country_id' => '31','region_id' => '3','name' => 'Rio de Janeiro','letter' => 'RJ','iso' => '33','status' => '0'),
            array('id' => '20','country_id' => '31','region_id' => '2','name' => 'Rio Grande do Norte','letter' => 'RN','iso' => '24','status' => '0'),
            array('id' => '21','country_id' => '31','region_id' => '1','name' => 'Rondônia','letter' => 'RO','iso' => '11','status' => '0'),
            array('id' => '22','country_id' => '31','region_id' => '1','name' => 'Roraima','letter' => 'RR','iso' => '14','status' => '0'),
            array('id' => '23','country_id' => '31','region_id' => '4','name' => 'Rio Grande do Sul','letter' => 'RS','iso' => '43','status' => '0'),
            array('id' => '24','country_id' => '31','region_id' => '4','name' => 'Santa Catarina','letter' => 'SC','iso' => '42','status' => '0'),
            array('id' => '25','country_id' => '31','region_id' => '2','name' => 'Sergipe','letter' => 'SE','iso' => '28','status' => '0'),
            array('id' => '26','country_id' => '31','region_id' => '3','name' => 'São Paulo','letter' => 'SP','iso' => '35','status' => '0'),
            array('id' => '27','country_id' => '31','region_id' => '1','name' => 'Tocantins','letter' => 'TO','iso' => '17','status' => '0')
        );

    }
}
