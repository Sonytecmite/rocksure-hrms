<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergency_Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'phone',
        'relationship',
        'home_address',
        'digital_address',
        'digital_address',
    ];
}
