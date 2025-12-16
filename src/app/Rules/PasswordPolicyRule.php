<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordPolicyRule implements Rule
{
    public function passes($attribute, $value)
    {
        $minLength    = setting('password.min_length', 8);
        $minUppercase = setting('password.min_uppercase', 1);
        $minNumbers   = setting('password.min_numbers', 1);
        $minSpecial   = setting('password.min_special', 1);

        return strlen($value) >= $minLength
            && preg_match_all('/[A-Z]/', $value) >= $minUppercase
            && preg_match_all('/[0-9]/', $value) >= $minNumbers
            && preg_match_all('/[\W_]/', $value) >= $minSpecial;
    }

    public function message()
    {
        return 'Le mot de passe ne respecte pas la politique de sécurité.';
    }
}
