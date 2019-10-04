<?php

use Illuminate\Database\Seeder;

class IngredientsTitleTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\IngredientTitleTranslation::class, 10)->create();
    }
}
