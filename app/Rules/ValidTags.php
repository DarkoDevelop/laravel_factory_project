<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidTags implements Rule
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
    //custom validation for tags
    public function passes($attribute, $value)
    {
        $data = (explode(',', $value));
        foreach ($data as $item) {
            if (!(preg_match("/[a-z]/i", $item)) && ((1 <= $value) && ($value <= 20))) {
                return true;
            }
        }
            
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
