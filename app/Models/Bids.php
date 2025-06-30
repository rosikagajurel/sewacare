<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    use HasFactory;

    protected $fillable = [
        'caregivers_id',
        'service_request_id',
        'proposed_price',
        'message',
        'status',
    ];
}

