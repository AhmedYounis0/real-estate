<?php

namespace App\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'     => 'Required|string',
            'content'   => 'Required|string',
            'image'     => 'nullable|mimes:jpg,png,jpeg|max:2024',
        ];
    }
}
