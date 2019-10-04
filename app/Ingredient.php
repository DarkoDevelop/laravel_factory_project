<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //To be sure to attach right table
    protected $table = 'ingredients';
    public $timestamps = false;

    public function ingredientHaveRecipes(){
        return $this->belongsToMany(Recipe::class);
    }
    public function ingredientsTitleTranslation(){
        return $this->hasOne(IngredientTitleTranslation::class);
    }
}
