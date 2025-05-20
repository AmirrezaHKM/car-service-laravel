<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable; // ← بسیار مهم
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'name',
        'email',
        'username',  // اضافه کردن فیلد username
        'password',
        'phone',
        'role',
        'status',
    ];

    // هش کردن پسورد قبل از ذخیره آن
    protected static function booted()
    {
        static::saving(function ($user) {
            if ($user->isDirty('password')) {
                // استفاده از bcrypt برای هش کردن پسورد
                $user->password = Hash::make($user->password);
            }
        });
    }

    // اگر نیاز به گارد کردن برخی فیلدها دارید می‌توانید این ویژگی را اضافه کنید
    // protected $guarded = ['id'];

    // برای استفاده از username به جای email در احراز هویت
    public function getAuthIdentifierName()
    {
        return 'phone'; // استفاده از فیلد username برای احراز هویت
    }

    // در صورت نیاز می‌توانید روابط مدل‌ها را نیز اضافه کنید.
}
