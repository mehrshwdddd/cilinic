<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'appointment_date',
        'appointment_time',
        'status'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }


}
