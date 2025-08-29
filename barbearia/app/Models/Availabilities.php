<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availabilities extends Model
{
    protected $protected = [
        'date',
        'time',
        'is_booked'
    ];

    protected $casts = [
        'time' => 'datetime:H:i',
        'date' => 'date',
        'is_booked' => 'boolean',
    ];

    public function appointments()
    {
        return $this->hasOne(Appointment::class);
    }
}
