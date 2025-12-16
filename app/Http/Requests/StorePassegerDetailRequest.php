<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePassegerDetailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'passegers' => 'required|array|min:1',
            'passegers.*.name' => 'required',
            'passegers.*.date_of_birth' => 'required',
            'passegers.*.nationality' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'passegers.*.name' => 'Passenger Name',
            'passegers.*.date_of_birth' => 'Passenger Date of Birth',
            'passegers.*.nationality' => 'Passenger Nationality',
        ];
    }


    public function messages()
    {
        return [
            'passegers.*.name.required' => ':attribute field is required.',
            'passegers.*.date_of_birth.required' => ':attribute field is required.',
            'passegers.*.nationality.required' => ':attribute field is required.',
        ];
    }
}
