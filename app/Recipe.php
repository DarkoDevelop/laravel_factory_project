<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //To be sure to attach right table
    protected $table = 'recipes';

    //One on one relationship with Category
    //Check if recipe has category, if true, return that category, if not, return null 
    public function category(){
        return $this->hasOne(Category::class);
    }

    //relation with translation description table
    public function titleTranslation(){
        return $this->hasOne(RecipeTitleTranslation::class);
    }

    //relation with translation description table
    public function descriptionTranslation(){
        return $this->hasOne(DescriptionRecipeTranslation::class);
    }

    //making relation with Tag class using pivot table
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    //making relation with Ingredient class using pivot table
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }
 
}
