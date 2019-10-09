<?php

namespace App\Http\Controllers;

use App\Recipe;
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
    static $lang;
    
    public function index(FormRecipeRequest $request)
    {
        $validated = $request->validated();
        $lang = $validated['lang'];

        if(empty($validated['category'])){
            $category = ("!NULL");
        }else 
            $category = $validated['category'];

        //Making default variable per_page
        if (empty($validated['per_page']))
        {
            $per_page = 0;
        }else 
            $per_page = $validated['per_page'];

        //Making default variable page
        if (empty($validated['page']))
        {
            $page = 0;
        }else 
            $page = $validated['page'];

        $recipeInstance = new Recipe();

        //saving data to paginated format
        $data = Recipe::paginate($per_page);

        $numbers = $recipeInstance->getCategoryRecipeID()->toArray();

        //sorting by Tag
        if($category == "NULL")
        {
            $data = $data;
        }
        elseif($category == "!NULL")
        {
            $data = Recipe::where([
                ['id', '!=', $numbers[0]],
                ['id', '!=', $numbers[1]],
                ['id', '!=', $numbers[2]],
                ['id', '!=', $numbers[3]],
                ['id', '!=', $numbers[4]]])->paginate($per_page);
        }
        elseif(is_int(intval($category)))
        {
            $number = (intval($category));
            $a = $recipeInstance->getCategoryNumber($number)->toArray();
            $data = Recipe::where('id', '=', $a[0])->paginate($per_page);
        }
        
        //validation for tags

        //dd($data);
        //$data = Recipe::all();
        return new RecipeCollection($data); 

    }  
}
   
