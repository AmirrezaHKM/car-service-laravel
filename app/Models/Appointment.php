<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'service_id',
        'repairman_id',
        'appointment_time',
        'proposed_time',
        'status',
        'customer_note',
        'repairman_note',
    ];


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function repairman()
    {
        return $this->belongsTo(User::class, 'repairman_id');
    }

    public function checklist()
    {
        return $this->hasOne(Checklist::class);
    }

    public function serviceReport()
    {
        return $this->hasOne(ServiceReport::class);
    }

    protected $casts = [
        'appointment_time' => 'datetime',
        'proposed_time' => 'datetime',
    ];
}
