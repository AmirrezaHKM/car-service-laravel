<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'repairman_id',   // شناسه تعمیرکار که این سرویس را ارائه داده
        'title',          // عنوان سرویس
        'description',    // توضیحات سرویس
        'price_estimate', // قیمت تخمینی سرویس
        'duration_estimate', // مدت زمان تخمینی سرویس
    ];

    // رابطه بین جدول 'services' و 'users' (تعمیرکار)
    public function repairman()
    {
        return $this->belongsTo(User::class, 'repairman_id');  // رابطه با تعمیرکار
    }
}
