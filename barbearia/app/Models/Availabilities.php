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

    public function appointments()
    {
        return $this->hasOne(Appointment::class);
    }
}
