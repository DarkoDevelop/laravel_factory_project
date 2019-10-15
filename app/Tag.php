<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tag extends Model
{
    //To be sure to attach right table
    protected $table = 'tags';
    public $timestamps = false;

    //relation with Recipe class using more to more relation
    public function recipes($id)
    {
        $data = DB::table('recipe_tag')
                    ->select('recipe_id')
                    ->whereIn('tag_id', $id)
                    ->pluck('recipe_id')->toArray();
        return $data;
    }
}
