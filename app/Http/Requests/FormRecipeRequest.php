<?php

namespace App\Http\Requests;
use App\Language;
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'per_page' => 'integer',
            'page' => 'integer',
            'category' => 'integer|between:0,5|nullable',
            'tags' => 'integer|between:0,20',
            'with' => 'required_with: ingredients, category, tags',
            'lang'=> 'required|exists:languages,lang',
            'diff_time' => 'date|integer|between:0000000001,9999999999'
        ];
    }
}