<?php

namespace App\Models;

use App\Models\User;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'patient_id',
        'service_id',
        'location',
        'preferred_time',
        'description',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
