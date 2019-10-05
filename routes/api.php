<?php

use Illuminate\Http\Request;

/*

pagination https://blog.hashvel.com/posts/pagination-in-laravel/
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', 'RecipeController@index');
