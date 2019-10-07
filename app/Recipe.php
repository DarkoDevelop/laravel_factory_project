<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    //making a function to get all recipes according to scpecific tag
    //needs to be finished
    public function filterTags($filter){
        $data = $this->belongsToMany(Tag::class) 
                    ->join('contacts', 'users.id', '=', 'contacts.user_id')
                    ->select();
    }
    
    //making relation with Ingredient class using pivot table
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    //making function for returning status code for specific recipes
    public function getStatus($diff_time, $id){
        if($diff_time==0){
            return "created";
        }else{
            //fetching required data from database
            $updated_at = $this->select('recipes.updated_at')->where('recipes.id', $id)->first();
            $updatedAt = $updated_at['updated_at'];
            $deleted_at = $this->select('recipes.deleted_at')->where('recipes.id', $id)->first();
            $deletedAt = $deleted_at['deleted_at'];

            //converting to timestamps to equal them all
            $deletedAtPreFinal = Carbon::createFromFormat('Y-m-d', $deletedAt )->timestamp;

            //converting all to DateTime format - had major issues usig other formats
            $deletedAtFinal = Carbon::createFromTimestamp($deletedAtPreFinal)->toDateTimeString(); 
            $diffTimeFinal = Carbon::createFromTimestamp($diff_time)->toDateTimeString(); 
           
            //time to compare them
            if ($diffTimeFinal <= $updatedAt){
                return "created";
            }else if(($diffTimeFinal > $updatedAt) && ($diffTimeFinal <= $deletedAtFinal)){
                return "modified";
            }else{
                return "deleted";
            }
        }         
    }
}
