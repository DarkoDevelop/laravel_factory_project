<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //To be sure to attach right table
    protected $table = 'tags';
    public $timestamps = false;

    //relation with Recipe class usin more to more relation
    public function recipes(){
        return $this->belongsToMany(Recipe::class);
    }

    //relation with translation table for tags
    public function translation(){
        return $this->hasOne(TitleTagTranslation::class);
    }
}
