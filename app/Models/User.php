<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone',
        'role',
        'status',
    ];

    // protected static function booted()
    // {
    //     static::saving(function ($user) {
    //         if ($user->isDirty('password')) {
    //             $user->password = Hash::make($user->password);
    //         }
    //     });
    // }


    public function getAuthIdentifierName()
    {
        return 'phone';
    }

    public function appointmentsAsCustomer()
    {
        return $this->hasMany(Appointment::class, 'customer_id');
    }

    public function appointmentsAsRepairman()
    {
        return $this->hasMany(Appointment::class, 'repairman_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }


    public function services()
    {
        return $this->hasMany(Service::class, 'repairman_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'repairman_id');
    }


    protected $appends = ['is_active'];

    public function getIsActiveAttribute(): bool
    {
        return (bool) $this->status;
    }
}
