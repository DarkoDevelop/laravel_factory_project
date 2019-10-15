<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Tag;
use App\Language;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\FormRecipeRequest;
use Illuminate\Pagination\Paginator;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\Recipe as RecipeTemplate;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(FormRecipeRequest $request)
    {
        $recipeInstance = new Recipe();
        $tagInstance = new Tag();

        $validated = $request->validated();
        $lang = $validated['lang'];

        //Making default variable tags and making as array instead of string(which is by default)
        if (empty($validated['tags'])) {
            $tags = null;
        } else {
            $tags = $validated['tags'];
            $tags = (explode(",",$tags));
        }
        
        //Making default variable category
        if (empty($validated['category'])) {
            $category = ("!NULL");
        } else {
            $category = $validated['category'];
        }
            
        //Making default variable per_page
        if (empty($validated['per_page'])) {
            $per_page = 0;
        } else {
            $per_page = $validated['per_page'];
        }
            
        //Making default variable page
        if (empty($validated['page'])) {
            $page = 0;
        } else {
            $page = $validated['page'];
        }
        
        //making sure to collect only recipe ID-s without category
        $numbers = $recipeInstance->getCategoryRecipeID()->toArray();

        //getting only recipe ID-s where entered tag array belongs to that recipe
        //and removing duplicates         
        if ($tags != null) {
            $tagsArray = array_unique($tagInstance->getRecipesID($tags));
        }

        //Category filtering
        if ($category == "!NULL") {  
            $data = resolve(Recipe::class);
        } elseif ($category == "NULL") {
            $data = Recipe::whereIn('id', $numbers);
        }  elseif (intval($category)) {
            $number = (intval($category));
            $categoryId = $recipeInstance->getCategoryNumber($number);
            $data = Recipe::whereIn('id', $categoryId);
        }

        //Tags filtering
        if ((isset($tagsArray)) && ($category == "!NULL")) {
            $data = $data->whereIn('id', $tagsArray);
        } elseif ((isset($tagsArray)) && ($category == "NULL")) {
            $data = $data->whereIn('id', $tagsArray);
        } elseif ((isset($tagsArray)) && !(intval($category) == 0)) {
            $array = array_intersect($categoryId, $tagsArray);
            $data = $data->whereIn('id', $array);
        }

        //paginating data 
        $data = $data->paginate($per_page);
        return new RecipeCollection($data); 
    }  
}
   
