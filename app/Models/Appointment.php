<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'customer_id',    // شناسه مشتری
        'vehicle_id',     // شناسه خودرو
        'service_id',     // شناسه سرویس
        'repairman_id',   // شناسه تعمیرکار
        'appointment_time', // زمان قرار ملاقات
        'proposed_time',  // زمان پیشنهادی
        'status',         // وضعیت قرار ملاقات
        'customer_note',  // یادداشت مشتری
        'repairman_note', // یادداشت تعمیرکار
    ];

    // روابط مدل Appointment با دیگر مدل‌ها:

    // رابطه با مدل User برای مشتری
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // رابطه با مدل Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    // رابطه با مدل Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // رابطه با مدل User برای تعمیرکار
    public function repairman()
    {
        return $this->belongsTo(User::class, 'repairman_id');
    }
}
