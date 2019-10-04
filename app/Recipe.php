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
        return $this->hasOne(Category::class);
    }

    public function titleTranslation(){
        return $this->hasOne(RecipeTitleTranslation::class);
    }

    public function recipeTranslation(){
        return $this->hasOne(DescriptionRecipeTranslation::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
 
}
