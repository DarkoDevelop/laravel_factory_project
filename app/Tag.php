<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //To be sure to attach right table
    protected $table = 'tags';
    public $timestamps = false;

    //relation with Recipe class using more to more relation
    public function recipes(){
        return $this->belongsToMany(Recipe::class);
    }
}
