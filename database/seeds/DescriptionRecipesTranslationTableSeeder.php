<?php

use Illuminate\Database\Seeder;

class DescriptionRecipesTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DescriptionRecipeTranslation::class, 10)->create();
    }
}
