<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address_line1' => 'required|string|max:255',
            'country_id' => 'required|integer',
            'zip_code' => 'required|string|max:10',
            'city_id' => 'required|string|max:255',
            'state_id' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'address_line1' => 'Please provide Address Line1.',
            'country_id' => 'Please provide the Country.',
            'zip_code' => 'Please provide the Zip Code.',
            'city.required' => 'Please provide the city.',
            'state.required' => 'Please provide the state.',
        ];
    }

}
