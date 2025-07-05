<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'medical_history',
        'prescriptions',
        'health_condition'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
