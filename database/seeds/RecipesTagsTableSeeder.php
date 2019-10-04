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
        factory(App\RecipeTagPivot::class, 20)->create();
    }
}
