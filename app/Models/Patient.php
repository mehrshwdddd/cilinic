<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable =[
        'first_name',
        'last_name',
        'phone_number',
        'national_code',
        'phone_number',
    ];
}
