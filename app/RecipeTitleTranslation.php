<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeTitleTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'title_recipes_translation';
    public $timestamps = false;

    //relation with recipe table
    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}
