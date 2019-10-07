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
 
        //saving data to paginated format

        //to do
        //if loop for tags, decide if table needs to be sorted according to specific tags

        //$data = Recipe::first();
        $data = Recipe::paginate($per_page);
        //$data = Recipe::all();
        return new RecipeCollection($data); 

    }  
}
   
