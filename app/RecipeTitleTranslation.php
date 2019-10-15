<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeTitleTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'title_recipes_translation';
    public $timestamps = false;
    protected $hidden = array('id', 'recipe_id');

    //relation with recipe table
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
