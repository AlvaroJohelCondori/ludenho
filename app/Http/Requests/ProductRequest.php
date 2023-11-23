<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route()->parameter('product');

        $rules = [
            'product_name' => 'required',
            'product_slug' => 'required|unique:products,product_slug',
            'product_status' => 'required|in:1,2',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($product) {
            $rules['product_slug'] = 'required|unique:products,product_slug,' . $product->id;
        }

        if ($this->product_status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'materials' => 'required',
                'product_extract' => 'required',
                'product_body' => 'required',
            ]);
        }

        return $rules;
    }
}
