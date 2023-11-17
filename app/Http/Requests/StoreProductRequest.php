<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'product_name' => 'required',
            'product_slug' => 'required|unique:products,product_slug',
            'product_status' => 'required|in:1,2',
            'product_image' => 'required|image',
        ];

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
