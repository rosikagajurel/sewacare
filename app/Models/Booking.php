<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id','caregiver_id','service_id','date_time','status',
        'location','price','duration_type','start_date','end_date','payment_status'
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function caregiver() {
        return $this->belongsTo(Caregiver::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
