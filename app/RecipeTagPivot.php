<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeTagPivot extends Model
{
    //To be sure to attach right table
    protected $table = 'recipes_tags';
    public $timestamps = false;
}
