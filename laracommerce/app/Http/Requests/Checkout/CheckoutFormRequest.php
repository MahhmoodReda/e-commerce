<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:225|min:5',
            'phone' => 'required|integer|max:11|min:11',
            'email' => 'required|email|string',
            'pincode' => 'required|integer|max:4|min:4',
            'address' => 'required|string|max:500'
        ];
    }
}
