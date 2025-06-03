<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $vehicles = [
            ['brand' => 'پراید', 'model' => '111', 'license_plate' => '12ب34567', 'year' => 2016],
            ['brand' => 'پژو', 'model' => '206', 'license_plate' => '34د56789', 'year' => 2018],
            ['brand' => 'سمند', 'model' => 'EF7', 'license_plate' => '45ر67890', 'year' => 2017],
            ['brand' => 'تیبا', 'model' => 'EX', 'license_plate' => '56س78901', 'year' => 2019],
            ['brand' => 'ساندرو', 'model' => 'استپ وی', 'license_plate' => '67ش89012', 'year' => 2021],
            ['brand' => 'کیا', 'model' => 'سراتو', 'license_plate' => '78ص90123', 'year' => 2020],
            ['brand' => 'هیوندای', 'model' => 'i20', 'license_plate' => '89ط01234', 'year' => 2022],
            ['brand' => 'مزدا', 'model' => '3', 'license_plate' => '90ع12345', 'year' => 2018],
            ['brand' => 'رنو', 'model' => 'تلیسمان', 'license_plate' => '11ف23456', 'year' => 2020],
            ['brand' => 'بنز', 'model' => 'C200', 'license_plate' => '22ق34567', 'year' => 2021],
        ];

        for ($userId = 8; $userId <= 17; $userId++) {
            $vehicleData = $vehicles[$userId - 8];

            Vehicle::create([
                'user_id' => $userId,
                'brand' => $vehicleData['brand'],
                'model' => $vehicleData['model'],
                'license_plate' => $vehicleData['license_plate'],
                'year' => $vehicleData['year'],
            ]);
        }
    }
}
