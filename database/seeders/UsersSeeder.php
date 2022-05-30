<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserBank;
use App\Models\UserConsumerUnit;
use App\Models\UserInfo;
use App\Models\UserInvoice;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

//use Faker\Generator;
//use Illuminate\Support\Facades\Hash;
//use function Sodium\add;

class UsersSeeder extends Seeder
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
            $user = User::create([
                'uuid' => $value['uuid'],
                'id' => $value['id'],
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'email' => $value['email'],
                'password' => $value['password'],
                'remember_token' => $value['remember_token'],
                'wallet_address' => $value['wallet_address']
            ]);

            if ($value['id'] === '2'){
                $this->addUserInfo($user);
                $this->addUserBalance($user);
                $this->addUserConsumerUnit($user);
                $this->addUserBank($user);
                $this->addUserInvoice($user);

//                $role = Role::find(2);
//                $permissions = Permission::pluck('id','id')->all();
//                $role->syncPermissions($permissions);
//                $user->assignRole([$role->id]);
            }

        }

    }

    public function data()
    {
        return array(
            array('uuid' => 'cef2af7b-d67e-4f4c-90da-feed026d3630', 'id' => '2','first_name' => 'Thiago','last_name' => 'Castro','email' => 'thiago@vatios.com.br','password' => '$2y$10$9TBl0KbNaey1Zg81TU3ECOwvG/Xl.Zl2H0ClgHqpFJEuPCLVEGE/6','remember_token' => NULL, 'wallet_address' => '0x8F52CF01b85492Ca7E4a79129E378d59c2203f02'  )
        );
    }

    private function addUserInfo($user)
    {
        $hardCoded = array('avatar' => 'images/zJbeWhpnqEDI8IF0h55nSzd4hXKALkCHZLGmZaif.jpg',
                            'company' => 'Vatios',
                            'phone' => '31988886463',
                            'city_id' => 1991,
                            'timezone' => 'Brasília',
                            'communication' => 'a:2:{s:5:"email";s:1:"1";s:5:"phone";s:1:"1";}',
                            'marketing' => '1',
                            'created_at' => '2022-01-17 19:15:34',
                            'updated_at' => '2022-01-17 19:15:34');

        $info = new UserInfo();
        foreach ($hardCoded as $key => $value) {
            $info->$key = $value;
        }

        $info->user()->associate($user);
        $info->save();
    }

    private function addUserBalance($user)
    {
        $hardCoded = array(
            'fiat' => '50000',
            'energy' => '20000',
            'crypto' => '0');

        $balance = new UserBalance();
        foreach ($hardCoded as $key => $value) {
            $balance->$key = $value;
        }
        $balance->user()->associate($user);
        $balance->save();
    }

    private function addUserConsumerUnit($user)
    {
        $hardCoded = array(
            array('name' => 'Minha casa','code' => '1/1111111111-1','address' => 'Rua Dr. Júlio Otaviano Ferreira','number' => '1048','type' => 'residence', 'city_id' => '1991'),
            array('name' => 'Loja do centro','code' => '2/2222222222-2','address' => 'Rua São Paulo','number' => '500','type' => 'business', 'city_id' => '1991'),
            array('name' => 'Sítio','code' => '3/3333333333-3','address' => 'Rua Caparaó','number' => '220','type' => 'property', 'city_id' => '1991')
        );

        foreach ($hardCoded as $reg) {

            $obj = new UserConsumerUnit();

            foreach ($reg as $key => $value) {
                $obj->$key = $value;
            }

            $obj->user()->associate($user);
            $obj->save();
        }
    }

    private function addUserBank($user)
    {
        $hardCoded = array(
            array('code' => '001','account' => '12345-6','branch' => '1111')
        );

        foreach ($hardCoded as $reg) {

            $obj = new UserBank();

            foreach ($reg as $key => $value) {
                $obj->$key = $value;
            }

            $obj->user()->associate($user);
            $obj->save();
        }
    }

    private function addUserInvoice($user)
    {
        $hardCoded = array(
            array('due_date' => '2022-04-10','user_consumer_unit_id' => '1','value' => '74670','consumption' => '635','payment' => 'payment-pending','file' => 'https://www.energisa.com.br/PublishingImages/imagens-conta/LIS_Frente.png'),
            array('due_date' => '2022-03-10','user_consumer_unit_id' => '1','value' => '19566','consumption' => '143','payment' => 'payment-pending','file' => 'https://www.energisa.com.br/PublishingImages/imagens-conta/LIS_Frente.png'),
            array('due_date' => '2022-02-10','user_consumer_unit_id' => '1','value' => '26398','consumption' => '204','payment' => 'payment-done','file' => 'https://www.energisa.com.br/PublishingImages/imagens-conta/LIS_Frente.png'),
            array('due_date' => '2022-01-10','user_consumer_unit_id' => '3','value' => '16206','consumption' => '113','payment' => 'payment-pending','file' => 'https://www.energisa.com.br/PublishingImages/imagens-conta/LIS_Frente.png'),
            array('due_date' => '2021-12-10','user_consumer_unit_id' => '2','value' => '18222','consumption' => '131','payment' => 'payment-done','file' => 'https://www.energisa.com.br/PublishingImages/imagens-conta/LIS_Frente.png'),
        );

        foreach ($hardCoded as $reg) {

            $obj = new UserInvoice();

            foreach ($reg as $key => $value) {
                $obj->$key = $value;
            }

            $obj->user()->associate($user);
            $obj->save();
        }


    }
}
