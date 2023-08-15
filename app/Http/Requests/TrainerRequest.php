<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'QR_code' => 'required|numeric|unique:trainers|digits:8',
            'plant_id' => 'required',
            'intern_number' => 'required|numeric',
            'national_id' => 'required|numeric|unique:trainers',
            'division' => 'required|string',
        ];
    }
}
