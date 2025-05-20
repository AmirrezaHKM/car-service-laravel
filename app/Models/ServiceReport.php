<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'appointment_id',      // شناسه قرار ملاقات
        'services_performed',  // سرویس‌های انجام شده
        'final_price',         // قیمت نهایی
        'additional_notes',    // یادداشت‌های اضافی
    ];

    // رابطه بین جدول 'service_reports' و 'appointments'
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');  // هر گزارش سرویس به یک قرار ملاقات تعلق دارد
    }
}
