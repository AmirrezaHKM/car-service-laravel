<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه دارند به صورت Mass Assignment پر شوند
    protected $fillable = [
        'ticket_id',  // شناسه تیکت
        'sender_id',  // شناسه فرستنده پیام
        'message',    // محتوا پیام
    ];

    // رابطه بین جدول 'ticket_messages' و 'tickets'
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');  // هر پیام به یک تیکت تعلق دارد
    }

    // رابطه بین جدول 'ticket_messages' و 'users'
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');  // هر پیام از یک کاربر ارسال می‌شود
    }
}
