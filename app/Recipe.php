<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Recipe extends Model
{
    //To be sure to attach right table
    protected $table = 'recipes';

    //One on one relationship with Category
    //Check if recipe has category
    public function category($lang)
    {
        return $this->belongsTo(Category::class)
                    ->select('id','categories_title_'.$lang, 'slug')
                    ->get();
    }

    //relation with translation description table with extra queries
    public function titleTranslation($lang, $id)
    {
        $data = $this->hasOne(RecipeTitleTranslation::class)
                ->select('title_recipes_translation.title_recipes_'.$lang)
                ->where('title_recipes_translation.id', $id)
                ->first();

        return $data['title_recipes_'.$lang];
    }

    //relation with translation description table with extra queries
    public function descriptionTranslation($lang, $id)
    {
        $data = $this->hasOne(DescriptionRecipeTranslation::class)
                ->select('description_recipes_translation.description_recipes_'.$lang)
                ->where('description_recipes_translation.id', $id)
                ->first();

        return $data['description_recipes_'.$lang];
    }

    //making relation with Tag class using pivot table
    public function tags($lang)
    {
        $data = $this->belongsToMany(Tag::class)
                     ->select('tags.id','title_tags_'.$lang, 'slug')
                     ->get();

        return $data;
    }

    //get title name title on specific language
    public function getTagName($id, $lang)
    {
        $data = $this->belongsToMany(Tag::class)
                     ->select('tags.id','title_tags_'.$lang)
                     ->where('tags.id', $id)
                     ->first();

        return $data['title_tags_'.$lang];
    }

    //get ingredient name on specific language
    public function getIngredientName($id, $lang)
    {
        $data = $this->belongsToMany(Ingredient::class)
                     ->select('ingredients.id','title_ingredients_'.$lang)
                     ->where('ingredients.id', $id)
                     ->first();

        return $data['title_ingredients_'.$lang];
    }

    //get category name on specific language
    public function getCategoryName($id, $lang)
    {    
        $data = DB::table('category')
                   ->where('id', '=' , $id)
                   ->pluck('categories_title_'.$lang) ->toArray();

        return $data[0];
    }


    //making relation with Ingredient class using pivot table
    public function ingredients($lang)
    {
        $data = $this->belongsToMany(Ingredient::class)
                    ->select('ingredients.id','title_ingredients_'.$lang, 'slug')
                    ->get();

        return $data;
    }

    //making function for returning status code for specific recipes
    //logic for diff time
    public function getStatus($diff_time, $id)
    {
        if ($diff_time==0) {
            return "created";
        } else {
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
            if ($diffTimeFinal <= $updatedAt) {
                return "created";
            } elseif (($diffTimeFinal > $updatedAt) && ($diffTimeFinal <= $deletedAtFinal)) {
                return "modified";
            } else {
                return "deleted";
            }
        }         
    }

    //filtering by category(not inluded) - for testing
    public function getCategoryRecipeID()
    {
            $data = DB::table('recipes')
                         ->pluck('category_id');  
            return $data;
    }

    //number for category filtering (included)
    public function getCategoryNumber($num)
    {
        $data = DB::table('recipes')
                     ->where('category_id','=', $num)
                     ->pluck('id')->toArray();

        return $data;
    } 
    
}
