<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            ['name' => 'علی رضایی', 'email' => 'ali@gmail.com', 'phone' => '09121110001'],
            ['name' => 'سارا مرادی', 'email' => 'sara@gmail.com', 'phone' => '09121110002'],
            ['name' => 'مینا کریمی', 'email' => 'mina@gmail.com', 'phone' => '09121110003'],
            ['name' => 'محمد حسینی', 'email' => 'mohammad@gmail.com', 'phone' => '09121110004'],
            ['name' => 'الهام شریفی', 'email' => 'elham@gmail.com', 'phone' => '09121110005'],
            ['name' => 'نیما صادقی', 'email' => 'nima@gmail.com', 'phone' => '09121110006'],
            ['name' => 'فاطمه قربانی', 'email' => 'fatemeh@gmail.com', 'phone' => '09121110007'],
            ['name' => 'رضا عبدی', 'email' => 'reza.abdi@gmail.com', 'phone' => '09121110008'],
            ['name' => 'مهسا سلطانی', 'email' => 'mahsa@gmail.com', 'phone' => '09121110009'],
            ['name' => 'امیر دهقان', 'email' => 'amir@gmail.com', 'phone' => '09121110010'],
        ];

        foreach ($customers as $customer) {
            User::create([
                'name' => $customer['name'],
                'email' => $customer['email'],
                'phone' => $customer['phone'],
                'password' => Hash::make('12345678'),
                'role' => 'customer',
                'status' => true,
            ]);
        }
    }
}
