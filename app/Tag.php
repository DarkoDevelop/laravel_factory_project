<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tag extends Model
{
    //To be sure to attach right table
    protected $table = 'tags';
    public $timestamps = false;

    //Relationship with recipes
    public function recipes()
    {
        return $this->belongsTo(Recipes::class);
    }

    //Query for getting RecipeID-s
    public function getRecipesID($id)
    {
        $data = DB::table('recipe_tag')
                    ->select('recipe_id')
                    ->whereIn('tag_id', $id)
                    ->pluck('recipe_id')->toArray();
        return $data;
    }
}
