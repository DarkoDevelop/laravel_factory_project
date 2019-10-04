<?php

use Illuminate\Database\Seeder;

class TitleTagsTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TitleTagTranslation::class, 10)->create();
    }
}
