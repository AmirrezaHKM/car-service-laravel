<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'user_id',   // شناسه کاربری که این وسیله نقلیه را ثبت کرده
        'brand',     // برند خودرو
        'model',     // مدل خودرو
        'license_plate',  // شماره پلاک خودرو
        'year',      // سال تولید خودرو
    ];

    // رابطه بین جدول 'vehicles' و 'users'
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
