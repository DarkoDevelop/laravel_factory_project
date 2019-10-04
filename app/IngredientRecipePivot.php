<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientRecipePivot extends Model
{
    //To be sure to attach right table
    protected $table = 'ingredients_recipes';
    public $timestamps = false;
}
