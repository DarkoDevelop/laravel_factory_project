<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //calling seeder classes
    public function run()
    {
        $this->call(CategoriesTitleTranslationTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(DescriptionRecipesTranslationTableSeeder::class);
        $this->call(IngredientsRecipesTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(IngredientsTitleTranslationTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(RecipesTagsTableSeeder::class);
        $this->call(RecipesTitleTranslationSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TitleTagsTranslationSeeder::class);
    }
}
