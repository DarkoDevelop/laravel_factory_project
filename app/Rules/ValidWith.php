<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidWith implements Rule
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

    //for validating with option
    public function passes($attribute, $value)
    {
        $data = (explode(',', $value));
        $num = count($data);
        if($num == 1){
            if(($data[0]=="tags") || ($data[0]=="ingredients") || ($data[0]=="categories")){
                return true;
            }else 
                return false;
        }elseif($num == 2){
            if((($data[0]=="tags") || ($data[0]=="ingredients") || ($data[0]=="categories"))&&(($data[1]=="tags") || ($data[1]=="ingredients") || ($data[1]=="categories")))
                return true;
            }
        elseif($num == 3){
            if((($data[0]=="tags") || ($data[0]=="ingredients") || ($data[0]=="categories"))&&(($data[1]=="tags") || ($data[1]=="ingredients") || ($data[1]=="categories"))&&(($data[2]=="tags") || ($data[2]=="ingredients") || ($data[2]=="categories")))
            return true;
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
