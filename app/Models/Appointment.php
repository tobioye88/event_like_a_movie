<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'appointment_date',
        'metadata',
        'status',
    ];

    protected $casts = [
        'metadata' => 'object',
        'appointment_date' => 'datetime',
    ];
}
