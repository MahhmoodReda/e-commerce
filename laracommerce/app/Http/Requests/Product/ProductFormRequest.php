<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'small_description' => [
                'nullable',
                'string'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer'
            ],
            'trending' => [
                'integer'
            ],
            'brand_id' => [
                'required',
                'integer'
            ],
            'meta_title' => [
                'nullable',
                'string'
            ],
            'meta_keyword' => [
                'nullable',
                'string'
            ],
            'meta_description' => [
                'nullable',
                'string'
            ],
            'image' => [
                'nullable',
            ]
        ];
    }
}
