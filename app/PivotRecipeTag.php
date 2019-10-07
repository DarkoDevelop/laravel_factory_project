<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotRecipeTag extends Model
{
    protected $table = 'recipe_tag';
    
    protected $hidden = ['pivot'];
}
