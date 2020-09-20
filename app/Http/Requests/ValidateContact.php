<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone1' => 'required|numeric|max:10',
            'phone2' =>'sometimes|required|numeric|max:10',
            'email' => 'sometimes|required|email|unique:contacts',
            'postal_address' => 'sometimes|required|string',
            'residential_address1' => 'required|string',
            'residential_address2' => 'required|string',
            'gps_address1' => 'required|string',
            'gps_address2' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'other_name' => 'sometimes|required|string',
            'phone' => 'required|numeric|max:10',
            'relationship' => 'required|string',
            'home_address' => 'required|string',
            'digital_address' => 'required|string',

        ];
    }
}
