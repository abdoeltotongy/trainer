<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainerRequest extends FormRequest
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
            'name' => 'nullable|string',
            'email' => 'nullable|string|email',
            'phone' => 'nullable|numeric',
            'QR_code' => 'nullable|numeric|unique:trainers|digits:8',
            'plant_id' => 'nullable',
            'intern_number' => 'nullable|numeric',
            'national_id' => 'nullable|numeric|unique:trainers',
            'division' => 'nullable|string',
        ];
    }
}
