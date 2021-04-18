<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UpperCase implements Rule
{

    public function passes($attribute, $value)
    {
        return strtoupper($value) == $value;
    }

    public function message()
    {
        return 'El texto no está en mayúsculas.';
    }
}
