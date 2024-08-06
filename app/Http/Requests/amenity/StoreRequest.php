<?php

namespace App\Http\Requests\amenity;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|array',
            'name.0' => 'required|string|max:255',
            'name.*' => 'nullable|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'name.0' => 'amenity name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.0.required' => 'Amenity name is required',
        ];
    }

}
