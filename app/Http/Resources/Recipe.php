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
  
            //returning tags
            'tags'=> 
                $this->tags($lang)->map(function ($item) use ($lang){
                    $data = ['id' => $item->id, 'title' => $item->value('title_tags_'.$lang), 'slug' => $item->slug];
                    return $data;
                }),
            
            //returning category
            'category'=> 
                $this->category($lang)->map(function ($item) use ($lang){
                    $data = ['id' => $item->id, 'title' => $item->value('categories_title_'.$lang), 'slug' => $item->slug];
                    if(!empty($data))
                        return $data;
                    else 
                        return "null"; //return null!!
                }),
            //returning ingredients
            'ingredients'=> 
                $this->ingredients($lang)->map(function ($item) use ($lang){
                    $data = ['id' => $item->id, 'title' => $item->value('title_ingredients_'.$lang), 'slug' => $item->slug];
                    return $data;
            }), 
        ]; 
    }
}
