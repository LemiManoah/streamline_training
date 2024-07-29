<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NationalRules implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $nationalid = str_split($value);
        $date_of_birth = str_split(explode('/', Request->input('dateOfBirth'))[2]);

        if (substr($nationalid, 0, 2) !== 'CM') {
            $fail('The :attribute must start with CM.');
        }
        // elseif ($date_of_birth[2] !== $nationalid[3] && $date_of_birth[3] !== $nationalid[4]) {
        //     $fail('The :attribute is invalid for entered Date of birth.');
        // }
    }
}
