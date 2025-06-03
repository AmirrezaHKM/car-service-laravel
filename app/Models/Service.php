<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'repairman_id',
        'title',
        'description',
        'price_estimate',
        'duration_estimate',
    ];

    public function repairman()
    {
        return $this->belongsTo(User::class, 'repairman_id');
    }


}
