<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RepairmanSeeder extends Seeder
{
    public function run()
    {
        $repairmen = [
            ['name' => 'رضا احمدی', 'email' => 'reza@gmail.com', 'phone' => '09120000001'],
            ['name' => 'مهدی کریمی', 'email' => 'mehdi@gmail.com', 'phone' => '09120000002'],
            ['name' => 'سعید موسوی', 'email' => 'saeed@gmail.com', 'phone' => '09120000003'],
            ['name' => 'علی قاسمی', 'email' => 'ali@gmail.com', 'phone' => '09120000004'],
            ['name' => 'محمد راد', 'email' => 'mohammad@gmail.com', 'phone' => '09120000005'],
            ['name' => 'جواد رضایی', 'email' => 'javad@gmail.com', 'phone' => '09120000006'],
        ];

        foreach ($repairmen as $r) {
            User::create([
                'name' => $r['name'],
                'email' => $r['email'],
                'phone' => $r['phone'],
                'password' => bcrypt('12345678'),
                'role' => 'repairman',
                'status' => true,
            ]);
        }
    }
}
