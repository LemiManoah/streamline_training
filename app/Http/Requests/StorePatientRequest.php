<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\customRules;
use App\Rules\NationalRules;



class StorePatientRequest extends FormRequest
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
            'first_name' => 'required|max:10',
            'last_name' => 'required|max:10',
            'dateOfBirth' => 'required|date',
            'gender' => 'required',
            'phonenumber' => [
                'required',
                'string',
                 new customRules
            ],
            'NIN' => [
                'required',
                function (string $attribute, mixed $value, Closure $fail){
                        $nationalid = str_split($value);
                        $date_of_birth = str_split(explode('/', $request->dateOfBirth)[2]);
            
                        if (substr($nationalid, 0, 2) !== 'CM') {
                            $fail('The :attribute must start with CM.');
                        }elseif ($date_of_birth[2] !== $nationalid[3] && $date_of_birth[3] !== $nationalid[4]) {
                            $fail('The :attribute is invalid for entered Date of birth.');
                        }
                    },
            ],
            'marital' => 'required',
            'nextOfkin' => 'required',
            'kincontactNumber' => [
                'required',
                'string',
               ],
            'Relationship' => 'required'
        ];
    }

    public function messages(): array{

        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name should not exceed 5 characters.',
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
            
            
        ];
        }
}

