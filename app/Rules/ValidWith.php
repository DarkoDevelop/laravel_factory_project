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
        if ($num == 1) {
            if (($data[0]=="tags") || ($data[0]=="ingredients") || ($data[0]=="category")) {
                return true;
            } else {
                return false;
            }    
        } elseif ($num == 2) {
            if((($data[0]=="tags") || ($data[0]=="ingredients") || ($data[0]=="category"))&&(($data[1]=="tags") || ($data[1]=="ingredients") || ($data[1]=="category"))) {
                return true;
                } 
            }
        elseif($num == 3){
            if((($data[0]=="tags") || ($data[0]=="ingredients") || ($data[0]=="category"))&&(($data[1]=="tags") || ($data[1]=="ingredients") || ($data[1]=="category"))&&(($data[2]=="tags") || ($data[2]=="ingredients") || ($data[2]=="category"))) {
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
        return 'With must be string. You can use following words seperated by comma: tags, category or ingredients.';
    }
}
