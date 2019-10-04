<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //To be sure to attach right table
    protected $table = 'category';
    public $timestamps = false;

    public function categoriesTranslation(){
        return $this->hasOne(CategoryTitleTranslation::class);
    }

    public function hasRecipe(){
        return $this->hasOne(Recipe::class);
    }

    
}
