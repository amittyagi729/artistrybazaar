<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdersRequest extends FormRequest
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
            'subtotal' => 'required|numeric',
            'shipping' => 'required|numeric',
            'numeric' =>  'numeric'
        ];
    }

    public function messages()
    {
        return [
            'subtotal.required' => 'The subtotal field is required.',
            'shipping.required' => 'The shipping field is required.',
            'numeric' => 'The :attribute must be a number.',
        ];
    }

}
