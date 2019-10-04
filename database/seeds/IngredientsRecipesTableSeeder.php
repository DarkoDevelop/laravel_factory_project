<?php

use Illuminate\Database\Seeder;

class IngredientsRecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding pivot tables using DB::table, there was an unexpected results
        //while using Eloquent to seed pivot table
        DB::table('ingredient_recipe')->insert(array(
            array('recipe_id' => 1,'ingredient_id' => 1),
            array('recipe_id' => 1,'ingredient_id' => 2),
            array('recipe_id' => 2,'ingredient_id' => 3),
            array('recipe_id' => 2,'ingredient_id' => 4),
            array('recipe_id' => 3,'ingredient_id' => 5),
            array('recipe_id' => 3,'ingredient_id' => 6),
            array('recipe_id' => 4,'ingredient_id' => 7),
            array('recipe_id' => 4,'ingredient_id' => 8),
            array('recipe_id' => 5,'ingredient_id' => 9),
            array('recipe_id' => 5,'ingredient_id' => 10),
            array('recipe_id' => 6,'ingredient_id' => 11),
            array('recipe_id' => 6,'ingredient_id' => 12),
            array('recipe_id' => 7,'ingredient_id' => 13),
            array('recipe_id' => 7,'ingredient_id' => 14),
            array('recipe_id' => 8,'ingredient_id' => 15),
            array('recipe_id' => 8,'ingredient_id' => 16),
            array('recipe_id' => 9,'ingredient_id' => 17),
            array('recipe_id' => 9,'ingredient_id' => 18),
            array('recipe_id' => 10,'ingredient_id' => 19),
            array('recipe_id' => 10,'ingredient_id' => 20)
        ));
    }
}
