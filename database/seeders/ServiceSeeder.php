<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            ['title' => 'تعویض روغن', 'description' => 'تعویض روغن موتور با کیفیت بالا', 'price_estimate' => 250000, 'duration_estimate' => 60],
            ['title' => 'تنظیم موتور', 'description' => 'تنظیم موتور، شمع‌ها و بهینه‌سازی عملکرد', 'price_estimate' => 350000, 'duration_estimate' => 90],
            ['title' => 'تعویض لنت ترمز', 'description' => 'تعویض لنت جلو و عقب با لنت اصلی', 'price_estimate' => 400000, 'duration_estimate' => 75],
            ['title' => 'تعویض باتری', 'description' => 'نصب باتری جدید با تست کامل برق خودرو', 'price_estimate' => 750000, 'duration_estimate' => 45],
            ['title' => 'تنظیم فرمان و بالانس', 'description' => 'تنظیم چرخ‌ها و بالانس برای رانندگی روان‌تر', 'price_estimate' => 200000, 'duration_estimate' => 50],
            ['title' => 'تعویض تسمه تایم', 'description' => 'تعویض تسمه تایم و بررسی کامل سیستم تایمینگ', 'price_estimate' => 600000, 'duration_estimate' => 120],
        ];

        $repairmanIds = range(2, 7);

        foreach ($repairmanIds as $repairmanId) {
            foreach ($services as $service) {
                Service::create([
                    'repairman_id' => $repairmanId,
                    'title' => $service['title'],
                    'description' => $service['description'],
                    'price_estimate' => $service['price_estimate'],
                    'duration_estimate' => $service['duration_estimate'],
                ]);
            }
        }
    }
}
