<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientTitleTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'ingredients_title_translation';
    public $timestamps = false;

    //relation with ingredient class
    public function ingredient(){
        return $this->belongsTo(Ingredient::class);
    }
}
