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
        
        //saving data to paginated format
        //$data = Recipe::paginate($per_page);

        $numbers = $recipeInstance->getCategoryRecipeID()->toArray();
        if ($tags != null) {
            $tagsArray = array_unique($tagInstance->getRecipesID($tags));
        }

        //dd(intval($category));
         /*
        //this part contains logic for sorting by category and tags
        if ($category == "!NULL") {
            if (!isset($tagsArray)) {
                $data = Recipe::paginate($per_page);
            } else {
                $data = Recipe::whereIn('id', $tagsArray)->paginate($per_page);
            }         
        } elseif ($category == "NULL") {
            if (!isset($tagsArray)) {
                $data = Recipe::whereNotIn('id', $numbers)->paginate($per_page);
            } else {
                $data = Recipe::whereNotIn('id', $numbers)->whereIn('id', $tagsArray)->paginate($per_page);
            }     
        } elseif (intval($category)) {
            if (!isset($tagsArray)) {
                $number = (intval($category));
                $a = $recipeInstance->getCategoryNumber($number)->toArray();
                $data = Recipe::where('id', '=', $a[0])->paginate($per_page);
            } else {
                $number = (intval($category));
                $a = $recipeInstance->getCategoryNumber($number)->toArray();

                //if category is equal to any of recipe_id which is get by tags
                if (in_array($a[0],$tagsArray)) {
                    $data = Recipe::where('id', '=', $a[0])->paginate($per_page);
                }    
                else {
                    return "There is no recipe in database with that tag_id and category_id";
                }      
            }
        }
        */
        
        //Category filtering
        if ($category == "!NULL") {
            $data = Recipe::paginate($per_page);
        } elseif ($category == "NULL") {
            $number = (intval($category));
            $a = $recipeInstance->getCategoryNumber($number)->toArray();
            $data = Recipe::where('id', '=', $a[0])->paginate($per_page);
        }  elseif (intval($category)) {
            $number = (intval($category));
            $a = $recipeInstance->getCategoryNumber($number);
            $data = Recipe::whereIn('id', $a)->paginate($per_page);
        }



        return new RecipeCollection($data); 
    }  
}
   
