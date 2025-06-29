<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'patient_id', 'caregiver_id', 'description', 'status'
    ];
}
