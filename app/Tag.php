<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //To be sure to attach right table
    protected $table = 'tags';
    public $timestamps = false;

    public function tagHaveRecipes(){
        return $this->belongsToMany(Recipes::class);
    }
    public function translation(){
        $this->hasOne(TitleTagTranslation::class);
    }
}
