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

        //getting language
        $lang = $allVariables['lang'];

        //with variable and showing/hiding optional section
        if(empty($allVariables['with'])){
            $withExtra = [];
        }else 
            $withExtra = (explode(',', $allVariables['with']));
        $displayIngredients = false;
        $displayTags = false;
        $displayCategory = false;
        if(in_array("category", $withExtra)){
            $displayCategory = true;
        }
        if(in_array("tags", $withExtra)){
            $displayTags = true;
        }
        if(in_array("ingredients", $withExtra)){
            $displayIngredients = true;
        }

        //making default variable with
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
                $this->tags($lang)->map(function ($item) use ($lang, $displayTags){
                    if(!$displayTags)
                        return null;
                    else{
                        $data = ['id' => $item->id, 'title' => $this->getTagName($item->id, $lang), 'slug' => $item->slug];
                        return $data;
                    }
                }),
            
            //returning category
            'category'=> 
                $this->category($lang)->map(function ($item) use ($lang, $displayCategory){
                    if(!$displayCategory)
                        return null;
                    else{
                        $data = ['id' => $item->id, 'title' =>  $this->getCategoryName($item->id, $lang), 'slug' => $item->slug];
                        return $data;
                    }
                    
                }),

            //returning ingredients
            'ingredients'=> 
                $this->ingredients($lang)->map(function ($item) use ($lang, $displayIngredients){
                    if(!$displayIngredients)
                        return null;
                    else{
                        $data = ['id' => $item->id, 'title' => $this->getIngredientName($item->id, $lang), 'slug' => $item->slug];
                        return $data;
                    }
            }), 
        ]; 
    }
}
