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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required',
            'description' => 'string|required',
            'brand' => 'string|required',
            'country' => 'string|required',
            'price' => 'string|required',
            'price_at_hour' => 'string|required',
            'count_at_sklad' => 'string|required',
            'image' => '',
            'category_id' => ''
        ];
    }

    public function prepareForValidation()
    {
        $path = $this->file('image0')->store('public');
        $this->merge(['image' => $path]);
    }
}
