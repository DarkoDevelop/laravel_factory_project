<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitleTagTranslation extends Model
{
    //To be sure to attach right table
    protected $table = 'tags_title_translation';
    public $timestamps = false;

    //relation with Tag 
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
