<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //To be sure to attach right table
    protected $table = 'recipes';

    //One on one relationship with Category
    //Check if recipe has category, if true, return that category, if not, return null == ??
    public function category(){
        return optional($recipe->category)->$this->hasOne(Category::class);
    }

    public function recipesTitleTranslation(){
        return $this->hasOne(RecipeTitleTranslation::class);
    }

    public function descriptionRecipeTranslation(){
        return $this->hasOne(DescriptionRecipeTranslation::class);
    }
 
}
