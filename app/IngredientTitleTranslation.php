<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientTitleTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'ingredients_title_translation';
    public $timestamps = false;

    public function ingredient(){
        $this->belongsTo(Ingredient::class);
    }
}
