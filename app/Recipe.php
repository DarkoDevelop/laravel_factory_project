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

    //relation with translation description table with extra queries
    public function titleTranslation($lang, $id){
        $data = $this->hasOne(RecipeTitleTranslation::class)
                ->select('title_recipes_translation.title_recipes_'.$lang)
                ->where('title_recipes_translation.id', $id)
                ->first();

        return $data['title_recipes_'.$lang];
    }

    //relation with translation description table with extra queries
    public function descriptionTranslation($lang, $id){
        $data = $this->hasOne(DescriptionRecipeTranslation::class)
                ->select('description_recipes_translation.description_recipes_'.$lang)
                ->where('description_recipes_translation.id', $id)
                ->first();

        return $data['description_recipes_'.$lang];
    }

    //making relation with Tag class using pivot table
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    //making relation with Ingredient class using pivot table
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    //making function for returning status code for specific recipes
    public function getStatus($diff_time, $id){
        if($diff_time==0){
            return "created";
        }else {


            
        }
    }
 
}
