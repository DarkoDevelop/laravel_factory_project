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
        factory(App\IngredientRecipePivot::class, 20)->create();
    }
}
