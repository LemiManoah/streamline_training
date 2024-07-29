<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'first_name' => 'sometimes|required|max:10',
            'last_name' => 'sometimes|required|max:10',
            'dateOfBirth' => 'sometimes|required|date',
            'gender' => 'sometimes|required',
            'phonenumber' => [
                'required',
                'string',
                'regex:/^\+256\d{7}$/'
            ],
            'phone' => 'sometimes|required|numeric',
            'NIN' => 'sometimes|required|unique',
            'marital' => 'sometimes|required',
            'nextOfkin' => 'sometimes|required',
            'kincontactNumber' => [
                'required',
                'string',
                'regex:/^\+256\d{7}$/'],
            'Relationship' => 'sometimes|required'
        ];
    }

    public function messages(): array{

        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name should not exceed 10 characters.',
            'last_name.required' => 'Last name is required.',
            'last_name.max' => 'Last name should not exceed 10 characters.',
            'dateOfBirth.required' => 'Date of birth is required.',
            'dateOfBirth.date' => 'Date of birth should be in the format dd/mm/yyyy.',
            'gender.required' => 'Gender is required.',
            'phonenumber.required' => 'Phone number is required.',
            'phone.numeric' => 'Phone number should be numeric.',
            'NIN.required' => 'National ID number is required.',
            'marital.required' => 'Marital status is required.',
            'nextOfkin.required' => 'Next of kin number is required.',
            'kincontactNumber.required' => 'Kin contact number is required.',
            'relationship.required' => 'Relationship to the patient is required.',
            'NIN.unique' => 'National ID number already exists.'
            
        ];
        }
}

