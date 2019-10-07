<?php

namespace App\Http\Requests;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Conttrollers\RecipeController;
use Illuminate\Foundation\Http\FormRequest;

class FormRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    //validating all requests
    public function rules()
    { 

        $extra = ['tags' ,'ingredients', 'categories'];
        return [
            'per_page' => 'integer',
            'page' => 'integer',
            'category' => 'integer|between:0,5|nullable',
            'tags' => 'numeric',
            'with' => 'in:' .implode(',',$extra),
            'lang' => 'required|exists:languages,lang',
            'diff_time' => 'digits_between:10,10'  
        ];
    }
}
