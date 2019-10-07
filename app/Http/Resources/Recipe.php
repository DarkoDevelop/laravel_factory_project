<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\FormRecipeRequest;
use App\Http\Conttrollers\RecipeController;
use Illuminate\Http\Request;
use App\Tag;
use DB;

class Recipe extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //getting validated query and saving only lang to lang variable
        $allVariables = $request->query->all();
        $lang = $allVariables['lang'];

        if (empty($allVariables['with']))
        {
            $with = 0;
        }else {
            $with = $allVariables['with'];
        }

        //Making default variable diff_time
        if (empty($allVariables['diff_time']))
        {
            $diff_time = 0;
        }else {
            $diff_time = $allVariables['diff_time'];
        }
        
        return [
            'id' => $this->id,
            'title' => $this->titleTranslation($lang, $this->id),
            'description' => $this->descriptionTranslation($lang, $this->id),
            'status' => $this->getStatus($diff_time, $this->id),
            //'idd' => $this->tags($lang),
            //'category' => $this->category,
            //'ingredients' => $this->ingredients,

            //returning tags
            'tags'=> 
                $this->tags($lang)->map(function ($item) use ($lang){
                    $data = ['id' => $item->id, 'title' => $item->value('title_tags_'.$lang), 'slug' => $item->slug];
                    return $data;
                }),

            'category'=> [
                //'title' => $this->category($lang),
                //'id' => 'id',
                //'title' => 'title',
                //'slug' => 'slug',
            ],
            'ingredients'=> [
                //'ingredients' => $this->ingredients,
                //'id' => 'id',
                //'title' => 'title',
                //'slug' => 'slug',
            ],
            
        ]; 
    }
}
/**
 * 
 * 
 * 
 * 'id' => $this->tags($lang)->map(function ($user) {
                    return collect($user->toArray())
                        ->only(['id'])
                        ->first();
                }),
                'title' => $this->tags($lang)->map(function ($user,$lang) {
                     return collect($user->toArray())
                        ->only(['title_tags_'.$lang])
                        ->first();
                }),
                'slug' =>$this->tags($lang)->map(function ($user) {
                    return collect($user->toArray())
                        ->only(['slug'])
                        ->first();
                }),
 */