<?php

namespace App\Models;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;

class MedicalDocument extends Model
{
    protected $fillable =[
        'patient_id',
        'title',
        'file',
    ];

    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Patient::class);
    }
}
