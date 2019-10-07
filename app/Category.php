<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //To be sure to attach right table
    protected $table = 'category';
    public $timestamps = false;


    //relation with category translation 
    public function translation($lang){
        $data = $this->hasOne(CategoryTitleTranslation::class)
                ->select('categories_title_translation.categories_title_'.$lang)
                ->first();
        return $data['categories_title_'.$lang];
    }

    //relation to recipe - one on one relation
    public function recipe(){
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    
}
