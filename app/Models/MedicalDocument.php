<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalDocument extends Model
{
    protected $fillable =[
        'patient_id',
        'title',
        'file',
    ];

    public function patient()
    {
        $this->belongsTo(Patient::class);
    }
}
