<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    protected $fillable = [
        'emp_id',
        'phone1',
        'phone2',
        'email',
        'postal_address',
        'residential_address1',
        'residential_address2',
        'gps_address1',
        'gps_address2',
    ];
}
