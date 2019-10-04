<?php

use Illuminate\Database\Seeder;

class CategoriesTitleTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CategoryTitleTranslation::class, 5)->create();
    }
}
