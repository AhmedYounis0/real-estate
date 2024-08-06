<?php

namespace App\Http\Requests\Agent;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgentRequest extends FormRequest
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
            'name'          => 'required|string|max:100',
            'email'         => 'required|string|email|max:100',
            'image'         => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'job_title'     => 'required|string|max:100',
            'company_name'  => 'nullable|string|max:100',
            'address'       => 'required|string|max:100',
            'phone'         => 'required','string', 'regex:/^0[0-9]{10}$/',
            'bio'           => 'required|string',
            'website'       => 'nullable|url|max:255',
        ];
    }
}
