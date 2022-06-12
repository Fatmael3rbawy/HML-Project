<?php

namespace Suppliers\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'           => 'required| string| max:191 |min:3',
            'images'         => 'required',
            'images.*'       => 'image|mimes:jpeg,png,jpg',
            'price'          => 'required|numeric',
            'category'       => 'required|exists:categories,id'
        ];
    }
}
