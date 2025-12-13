<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Caregiver;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'date_time', 'status', 'location', 'price',
        'duration_type', 'start_date', 'end_date',
        'payment_status', 'patients_id', 'caregivers_id', 'services_id',
    ];

    // Relationship to Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_id');
    }

    // Relationship to Caregiver
    public function caregiver()
    {
        return $this->belongsTo(Caregiver::class, 'caregivers_id');
    }

    // Relationship to Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'services_id');
    }
}
