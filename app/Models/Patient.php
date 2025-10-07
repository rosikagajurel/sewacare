<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','email','date_of_birth','gender','blood_group','contact_number',
        'address','city','state','postal_code','emergency_contact_name',
        'emergency_contact_number','insurance_provider','insurance_number',
        'medical_history','prescriptions','health_condition','allergies',
        'disabilities','verified_status','rating','notes'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
