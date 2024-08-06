<?php

namespace App\Http\Requests\package;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'name'                  => 'required|string',
            'price'                 => 'required|numeric',
            'duration'              => 'required|numeric',
            'properties_allowed'    => 'required|numeric',
            'featured_properties'   => 'required|numeric',
            'photos_allowed'        => 'required|numeric',
            'videos_allowed'        => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
          'name' => 'Package Name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Package Name is required',
            'price.required' => 'Price is required',
            'duration.required' => 'Package Duration is required',
            'properties_allowed.required' => 'Package Allowed is required',
            'featured_properties.required' => 'Package Featured is required',
            'photos_allowed.required' => 'Package Photos is required',
            'videos_allowed.required' => 'Package Videos is required',
            'name.string' => 'Package Name must be string',
            'price.numeric' => 'Price must be numeric',
            'duration.numeric' => 'Package Duration must be numeric',
            'properties_allowed.numeric' => 'Package Allowed must be numeric',
            'featured_properties.numeric' => 'Package Featured must be numeric',
            'photos_allowed.numeric' => 'Package Photos must be numeric',
            'videos_allowed.numeric' => 'Package Videos must be numeric',
        ];
    }
}
