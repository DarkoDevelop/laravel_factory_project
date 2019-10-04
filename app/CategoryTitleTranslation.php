<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTitleTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'categories_title_translation';
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
