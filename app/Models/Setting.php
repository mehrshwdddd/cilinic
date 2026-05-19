<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable =[
        'clinic_name',
        'address',
        'phone',
        'map_address'
    ];
}
