<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //To be sure to attach right table
    protected $table = 'category';
    public $timestamps = false;


    //relation with category translation 
    public function translation(){
       return $this->hasOne(CategoryTitleTranslation::class);
    }

    //relation to recipe - one on one relation
    public function recipe(){
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    
}
