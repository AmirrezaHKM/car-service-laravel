<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'appointment_id',      // شناسه قرار ملاقات
        'condition_description', // توضیحات وضعیت خودرو
        'damage_report',        // گزارش آسیب خودرو
    ];

    // رابطه بین جدول 'checklists' و 'appointments'
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');  // هر چک‌لیست به یک قرار ملاقات تعلق دارد
    }
}
