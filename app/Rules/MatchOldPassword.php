<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        // return Hash::check($value, auth()->user()->password);
        if (!Hash::check($value, Auth::user()->password)) {
            $fail('The :attribute is not match with old password.');
        }
    }

    // public function passes($attribute, $value)
    // {
    //     return Hash::check($value, auth()->password);
    // }

    // public function message()
    // {

    //     return 'The :attribute is match with old password.';
    // }
}
