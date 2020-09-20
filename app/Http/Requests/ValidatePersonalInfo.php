<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonalInfo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'other_name' => 'sometimes|required',
            'dob' => 'required|date',
            'hometown' => 'required|string',
            'marital_status' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'required|string',
            'photo'=> 'required',
            'place_of_stay' => 'required|string',
            'point_of_hire' => 'required|string',
            'gender' => 'required',
            'section' => 'required|string',
            'position' => 'required|string',
            'allergy' => 'sometimes',
            'religion' => 'required',
            'hobbies' => 'required|string',
            'lang_spoken' => 'required|string',
            'department' => 'required',
            'passport_number' => 'sometimes|required|string',
            'ppt_exp_date' => 'sometimes|required|string',
            'license_number' => 'sometimes|required|string',
            'license_class' => 'sometimes|required|string',
            'license_exp_date' => 'sometimes|required|date',
            'contract_file' => 'required',
        ];
    }
}
