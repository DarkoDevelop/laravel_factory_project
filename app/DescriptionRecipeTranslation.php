<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescriptionRecipeTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'description_recipes_translation';
    public $timestamps = false;
    protected $hidden = array('id', 'recipe_id');

    //making relation with recipe class
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
