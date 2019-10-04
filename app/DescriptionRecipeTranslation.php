<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescriptionRecipeTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'description_recipes_translation';
    public $timestamps = false;

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}
