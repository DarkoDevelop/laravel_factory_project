<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Console\Command;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidCategory implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    //validation for category field
    public function passes($attribute, $value)
    {
        if ((!(preg_match("/[a-z]/i", $value)) && ((1 <= $value) && ($value <= 15))) || ($value == "NULL") || ($value == "!NULL")) {
            return true;
        } else {
            return false;
        }     
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid category entered. Category must be one of the following: number (1 to 15), NULL or !NULL.';
    }
}
