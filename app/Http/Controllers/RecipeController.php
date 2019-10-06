<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Language;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\FormRecipeRequest;
use Illuminate\Pagination\Paginator;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(FormRecipeRequest $request)
    {
        $validated = $request->validated();
        $lang = $validated['lang'];

        


        if(!isset($validated['per_page']))
            $per_page = null;
         else
            $per_page = $validated['per_page'];

            return $per_page.$lang;       
                        
    }     
}











        /*

{
        //validating data
        $validatedData = $request->validate([
            'per_page' => 'integer',
            'page' => 'integer',
            'category' => 'integer|between:0,5',
            'tags' => 'integer|between:0,20',
            'with' => 'required_with: ingredients, category, tags',
            'lang'=> 'unique:languages,languages',
            'diff_time' => 'date|integer|between:0000000001,9999999999',
        ]);
        return 'table is good';   
    }  


        {

            $per_page = $request->query('per_page');
            $page= $request->query('page');
            $category= $request->query('category');
            $tags = $request->query('tags');
            $with = $request->query('with');
            $lang = $request->query('lang');
            $diff_time = $request->query('diff_time');

            // returns array of entire input query...can now use $query['value'], etc. to access data
            $query = $request->all();

            // Or to keep business logic out of controller, I use like:
            $n = new MyClass($request->all());
            $n->doSomething();
            $n->etc();


            $validatedData = $request->validate([
                'per_page' => 'unique|max:255',
                'page' => 'required',
                'category' => 'required',
                'tags' => 'required',
                'with' => 'required',
                'lang' => 'required',
                'diff_time' => 'required',
            ]);
            // The blog post is valid...
        
        $results = Recipe::all()
        return $results;
    }

    public function meta(){
        $results = Recipe::paginate();
        return $results;
        

    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }


    public function show(Recipe $recipe)
    {
        //
    }

  
    public function edit(Recipe $recipe)
    {
        //
    }

  
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

   
    public function destroy(Recipe $recipe)
    {
        //
    }
    */

