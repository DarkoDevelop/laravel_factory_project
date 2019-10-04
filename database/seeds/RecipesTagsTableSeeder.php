<?php

use Illuminate\Database\Seeder;

class RecipesTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        //seeding pivot tables using DB::table, there was an unexpected results
        //while using Eloquent to seed pivot table - internet showed to to this this way 
        DB::table('recipe_tag')->insert(array(
            array('recipe_id' => 1,'tag_id' => 1),
            array('recipe_id' => 1,'tag_id' => 2),
            array('recipe_id' => 2,'tag_id' => 3),
            array('recipe_id' => 2,'tag_id' => 4),
            array('recipe_id' => 3,'tag_id' => 5),
            array('recipe_id' => 3,'tag_id' => 6),
            array('recipe_id' => 4,'tag_id' => 7),
            array('recipe_id' => 4,'tag_id' => 8),
            array('recipe_id' => 5,'tag_id' => 9),
            array('recipe_id' => 5,'tag_id' => 10),
            array('recipe_id' => 6,'tag_id' => 11),
            array('recipe_id' => 6,'tag_id' => 12),
            array('recipe_id' => 7,'tag_id' => 13),
            array('recipe_id' => 7,'tag_id' => 14),
            array('recipe_id' => 8,'tag_id' => 15),
            array('recipe_id' => 8,'tag_id' => 16),
            array('recipe_id' => 9,'tag_id' => 17),
            array('recipe_id' => 9,'tag_id' => 18),
            array('recipe_id' => 10,'tag_id' => 19),
            array('recipe_id' => 10,'tag_id' => 20)
        ));
    }
}
