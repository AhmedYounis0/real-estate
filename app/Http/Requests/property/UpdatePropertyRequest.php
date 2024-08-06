<?php

namespace App\Http\Requests\property;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'name'          => 'Required|string',
            'price'         => 'Required|numeric',
            'description'   => 'Required|string',
            'location_id'   => 'Required|exists:locations,id',
            'type_id'       => 'Required|exists:types,id',
            'purpose'       => 'Required|string',
            'bedroom'       => 'Required|numeric',
            'bathroom'      => 'Required|numeric',
            'size'          => 'Required|numeric',
            'floor'         => 'nullable|numeric',
            'garage'        => 'nullable|numeric',
            'balcony'       => 'nullable|numeric',
            'address'       => 'nullable|string',
            'built_year'    => 'nullable|numeric',
            'location_map'  => 'nullable',
            'is_featured'   => 'nullable|boolean',
            'amenities'     => 'nullable|array',
            'amenities.*'   => 'exists:amenities,id',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
          'location_id' => 'location',
          'type_id'     => 'type'
        ];
    }
}
