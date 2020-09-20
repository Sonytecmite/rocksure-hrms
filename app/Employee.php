<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'emp_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'nationality',
        'dob',
        'marital_status',
        'section',
        'hometown',
        'photo',
        'position',
        'place_of_stay',
        'point_of_hire',
        'department_id',
        'contract_file',
        'allergy',
        'hobbies',
        'religion',
        'country',
        'lang_spoken',
        'passport_number',
        'ppt_exp_date',
        'license_number',
        'license_class',
        'license_exp_date',
    ];

}
