<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //To be sure to attach right table
    protected $table = 'languages';
    public $timestamps = false;
}
