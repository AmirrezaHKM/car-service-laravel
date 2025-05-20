<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'user_id',     // شناسه کاربر
        'subject',     // موضوع تیکت
        'status',      // وضعیت تیکت
    ];

    // رابطه بین جدول 'tickets' و 'users'
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // هر تیکت به یک کاربر تعلق دارد
    }
}
