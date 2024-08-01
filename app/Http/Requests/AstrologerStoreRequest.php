<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AstrologerStoreRequest extends FormRequest
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
            'full_name' => 'required',
            'email' => 'required|email|unique:astrologers',
            'password' => 'required|string|min:8',
            'phone' => 'required',
            'img_url' => 'required',
            'experience_years' => 'required',
            'specialization' => 'required',
            'bio' => 'required',
            'gender' => 'required',
            'cash_amount' => 'required',
            'date_created' => 'required'
        ];
    }
}
