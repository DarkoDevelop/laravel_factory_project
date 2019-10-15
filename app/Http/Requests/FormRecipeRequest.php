<?php

namespace App\Http\Requests;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\ValidCategory;
use App\Rules\ValidWith;
use App\Rules\ValidTags;
use App\Http\Conttrollers\RecipeController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        return [
            'per_page' => 'integer',
            'page' => 'integer',
            'category' => ['nullable', new ValidCategory],
            'tags' => ['nullable', new ValidTags],
            'with' => ['nullable', new ValidWith],
            'lang' => 'required|exists:languages,lang',
            'diff_time' => 'digits_between:10,10'  
        ];
    }

    //messages to be written if user enter invalid data
    public function message()
    {
        return[
            'lang.required' => 'Please enter valid existing language for request.',
            'page.integer' => 'Please enter integer number for page request.',
            'per_page.integer' => 'Please enter integer number for per page request.',
        ];
    }

    //to show all errors as json format
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
