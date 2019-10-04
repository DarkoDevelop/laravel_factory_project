<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //To be sure to attach right table
    protected $table = 'tags';
    public $timestamps = false;

    public function recipes(){
        return $this->belongsToMany(Recipe::class);
    }
    public function translation(){
        return $this->hasOne(TitleTagTranslation::class);
    }
}
