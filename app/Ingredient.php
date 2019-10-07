<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //To be sure to attach right table
    protected $table = 'ingredients';
    public $timestamps = false;

    //relation with many to many using pivot with recipe class
    public function recipes(){
        return $this->belongsToMany(Recipe::class);
    }

    //relation with translation table for ingredients
    public function translation(){
        $data = $this->hasOne(IngredientTitleTranslation::class)
                     ->select('ingredients_title_translation.title_ingredients_'.$lang)
                     ->first();

        return $data['title_ingredients_'.$lang];
    }
}
